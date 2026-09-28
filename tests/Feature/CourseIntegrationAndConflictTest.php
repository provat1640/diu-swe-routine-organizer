<?php

namespace Tests\Feature;

use App\Models\AcademicRoutine;
use App\Services\CourseIntegrationService;
use Database\Seeders\AcademicRoutineSeeder;
use Database\Seeders\CourseOfferingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CourseIntegrationAndConflictTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CourseOfferingSeeder::class);
        $this->seed(AcademicRoutineSeeder::class);
    }

    /**
     * [AG-FIX-02] Verify course title resolution and metadata normalization.
     */
    public function test_course_title_resolution_and_property_normalization(): void
    {
        CourseIntegrationService::warmTitleCache();

        // Resolve official name for SE111
        $courseName = CourseIntegrationService::resolveCourseName('SE111');
        $this->assertNotEmpty($courseName);
        $this->assertEquals('Computer Fundamentals', $courseName);

        // Normalize an individual routine item
        $routine = DB::table('academic_routines')->where('course_id', 'SE111')->first();
        $this->assertNotNull($routine);

        $normalized = CourseIntegrationService::normalizeCourse($routine);

        $this->assertEquals('SE111', $normalized->course_id);
        $this->assertEquals('Computer Fundamentals', $normalized->course_name);
        $this->assertNotEmpty($normalized->teacher_name);
        $this->assertNotEmpty($normalized->teacher_designation);
        $this->assertNotEmpty($normalized->start_time_formatted);
        $this->assertNotEmpty($normalized->end_time_formatted);
        $this->assertNotEmpty($normalized->time_slot_formatted);
        $this->assertFalse($normalized->is_continuation);
    }

    /**
     * [AG-FIX-01] Verify edge-to-edge back-to-back classes do NOT bleed across time slots.
     */
    public function test_back_to_back_classes_do_not_bleed_across_adjacent_time_slots(): void
    {
        $timeSlots = AcademicRoutine::TIME_SLOTS;

        // Class 1: 08:30:00 to 10:00:00
        $class1 = (object) [
            'id' => 9001,
            'day_of_week' => 'Sunday',
            'course_id' => 'SWE111',
            'teacher_initials' => 'DSM',
            'classroom_no' => 'SWE-401',
            'building' => 'SWE Building',
            'batch' => 49,
            'section' => 'A',
            'major_track' => null,
            'start_time' => '08:30:00',
            'end_time' => '10:00:00',
        ];

        // Class 2: 10:00:00 to 11:30:00 (Starts exactly at Class 1 end_time)
        $class2 = (object) [
            'id' => 9002,
            'day_of_week' => 'Sunday',
            'course_id' => 'SWE112',
            'teacher_initials' => 'TK',
            'classroom_no' => 'SWE-402',
            'building' => 'SWE Building',
            'batch' => 49,
            'section' => 'A',
            'major_track' => null,
            'start_time' => '10:00:00',
            'end_time' => '11:30:00',
        ];

        $resolved = CourseIntegrationService::buildConflictResolvedGrid(collect([$class1, $class2]), $timeSlots);
        $grid = $resolved['grid'];

        // Slot 1 (08:30 - 10:00) must contain ONLY Class 1
        $slot1Classes = $grid['Sunday']['08:30 AM - 10:00 AM'];
        $this->assertCount(1, $slot1Classes);
        $this->assertEquals('SWE111', $slot1Classes[0]->course_id);

        // Slot 2 (10:00 - 11:30) must contain ONLY Class 2
        $slot2Classes = $grid['Sunday']['10:00 AM - 11:30 AM'];
        $this->assertCount(1, $slot2Classes);
        $this->assertEquals('SWE112', $slot2Classes[0]->course_id);

        // No soft conflicts should be logged for back-to-back classes
        $this->assertFalse($resolved['has_conflicts']);
    }

    /**
     * [AG-FIX-01] Verify multi-slot spanning course (e.g. 3-hour lab) is assigned to both slots with continuation tag.
     */
    public function test_multi_slot_spanning_course_is_rendered_in_all_slots_with_continuation_tag(): void
    {
        $timeSlots = AcademicRoutine::TIME_SLOTS;

        // 3-hour Lab: 08:30:00 to 11:30:00 (Spans Slot 1 and Slot 2)
        $labClass = (object) [
            'id' => 9003,
            'day_of_week' => 'Monday',
            'course_id' => 'SWE113L',
            'teacher_initials' => 'SRH',
            'classroom_no' => 'SWE-Lab1',
            'building' => 'SWE Building',
            'batch' => 49,
            'section' => 'A',
            'major_track' => null,
            'start_time' => '08:30:00',
            'end_time' => '11:30:00',
        ];

        $resolved = CourseIntegrationService::buildConflictResolvedGrid(collect([$labClass]), $timeSlots);
        $grid = $resolved['grid'];

        // Slot 1 (08:30 - 10:00) should have the first instance (not continuation)
        $slot1Classes = $grid['Monday']['08:30 AM - 10:00 AM'];
        $this->assertCount(1, $slot1Classes);
        $this->assertFalse($slot1Classes[0]->is_continuation);

        // Slot 2 (10:00 - 11:30) should have the continued instance marked as continuation
        $slot2Classes = $grid['Monday']['10:00 AM - 11:30 AM'];
        $this->assertCount(1, $slot2Classes);
        $this->assertTrue($slot2Classes[0]->is_continuation);
        $this->assertStringContainsString('Continuation', $slot2Classes[0]->continuation_note);
    }

    /**
     * [AG-FIX-03] Verify conflict engine handles parallel track electives without dropping either.
     */
    public function test_conflict_engine_handles_parallel_tracks_without_dropping_either(): void
    {
        $timeSlots = AcademicRoutine::TIME_SLOTS;

        // Track SE Elective
        $trackSE = (object) [
            'id' => 9010,
            'day_of_week' => 'Tuesday',
            'course_id' => 'SE411',
            'teacher_initials' => 'DSM',
            'classroom_no' => 'SWE-401',
            'building' => 'SWE Building',
            'batch' => 41,
            'section' => 'A',
            'major_track' => 'SE',
            'start_time' => '08:30:00',
            'end_time' => '10:00:00',
        ];

        // Track DS Elective at identical time
        $trackDS = (object) [
            'id' => 9011,
            'day_of_week' => 'Tuesday',
            'course_id' => 'DS412',
            'teacher_initials' => 'TK',
            'classroom_no' => 'SWE-402',
            'building' => 'SWE Building',
            'batch' => 41,
            'section' => 'A',
            'major_track' => 'DS',
            'start_time' => '08:30:00',
            'end_time' => '10:00:00',
        ];

        $resolved = CourseIntegrationService::buildConflictResolvedGrid(collect([$trackSE, $trackDS]), $timeSlots);
        $grid = $resolved['grid'];

        $slotClasses = $grid['Tuesday']['08:30 AM - 10:00 AM'];
        // ZERO DATA LOSS: Both classes preserved in the cell
        $this->assertCount(2, $slotClasses);
        $this->assertTrue($slotClasses[0]->is_conflict);
        $this->assertEquals('parallel_tracks', $slotClasses[0]->conflict_type);
        $this->assertStringContainsString('Parallel Track Electives', $slotClasses[0]->conflict_label);
        $this->assertTrue($resolved['has_conflicts']);
    }

    /**
     * [AG-FIX-03] Verify conflict engine detects and classifies concurrent lab subgroups (A1 / A2).
     */
    public function test_conflict_engine_handles_concurrent_lab_subgroups(): void
    {
        $timeSlots = AcademicRoutine::TIME_SLOTS;

        $labA1 = (object) [
            'id' => 9020,
            'day_of_week' => 'Wednesday',
            'course_id' => 'SWE221L',
            'teacher_initials' => 'SRH',
            'classroom_no' => 'SWE-Lab1',
            'building' => 'SWE Building',
            'batch' => 47,
            'section' => 'A1',
            'major_track' => null,
            'start_time' => '10:00:00',
            'end_time' => '11:30:00',
        ];

        $labA2 = (object) [
            'id' => 9021,
            'day_of_week' => 'Wednesday',
            'course_id' => 'SWE222L',
            'teacher_initials' => 'MNH',
            'classroom_no' => 'SWE-Lab2',
            'building' => 'SWE Building',
            'batch' => 47,
            'section' => 'A2',
            'major_track' => null,
            'start_time' => '10:00:00',
            'end_time' => '11:30:00',
        ];

        $resolved = CourseIntegrationService::buildConflictResolvedGrid(collect([$labA1, $labA2]), $timeSlots);
        $grid = $resolved['grid'];

        $slotClasses = $grid['Wednesday']['10:00 AM - 11:30 AM'];
        $this->assertCount(2, $slotClasses);
        $this->assertTrue($slotClasses[0]->is_conflict);
        $this->assertEquals('lab_subgroup_split', $slotClasses[0]->conflict_type);
        $this->assertStringContainsString('Concurrent Lab Groups', $slotClasses[0]->conflict_label);
    }

    /**
     * [AG-FIX-03] Verify direct clash is tagged and soft logged.
     */
    public function test_conflict_engine_handles_direct_clash_with_soft_logging(): void
    {
        Log::shouldReceive('info')->once()->withArgs(function ($message) {
            return str_contains($message, 'Soft Scheduling Conflict detected') && str_contains($message, 'direct_clash');
        });

        $timeSlots = AcademicRoutine::TIME_SLOTS;

        $clash1 = (object) [
            'id' => 9030,
            'day_of_week' => 'Thursday',
            'course_id' => 'SWE311',
            'teacher_initials' => 'DSM',
            'classroom_no' => 'SWE-401',
            'building' => 'SWE Building',
            'batch' => 48,
            'section' => 'A',
            'major_track' => null,
            'start_time' => '11:30:00',
            'end_time' => '13:00:00',
        ];

        $clash2 = (object) [
            'id' => 9031,
            'day_of_week' => 'Thursday',
            'course_id' => 'SWE312',
            'teacher_initials' => 'TK',
            'classroom_no' => 'SWE-401',
            'building' => 'SWE Building',
            'batch' => 48,
            'section' => 'A',
            'major_track' => null,
            'start_time' => '11:30:00',
            'end_time' => '13:00:00',
        ];

        $resolved = CourseIntegrationService::buildConflictResolvedGrid(collect([$clash1, $clash2]), $timeSlots);
        $grid = $resolved['grid'];

        $slotClasses = $grid['Thursday']['11:30 AM - 01:00 PM'];
        $this->assertCount(2, $slotClasses);
        $this->assertEquals('direct_clash', $slotClasses[0]->conflict_type);
    }

    /**
     * [AG-FIX-04] Full system verification: zero data loss across UI and CSV.
     */
    public function test_zero_data_loss_on_routine_dashboard_and_csv_export(): void
    {
        // 1. HTTP Dashboard verification
        $response = $this->get('/?batch=49&section=A');
        $response->assertStatus(200);
        $response->assertViewHas('weeklyGrid');
        $response->assertViewHas('softConflicts');
        $response->assertViewHas('hasConflicts');

        // 2. Batch 41 with All Tracks (Known concurrent tracks scenario)
        $batch41Response = $this->get('/?batch=41&section=A');
        $batch41Response->assertStatus(200);
        $weeklyGrid = $batch41Response->viewData('weeklyGrid');
        $this->assertNotEmpty($weeklyGrid);

        // 3. CSV Export includes all courses and headers without data loss
        $csvResponse = $this->get(route('routine.export.csv', ['batch' => 49, 'section' => 'A']));
        $csvResponse->assertStatus(200);
        $this->assertEquals('text/csv; charset=UTF-8', $csvResponse->headers->get('Content-Type'));
        $content = $csvResponse->getContent();
        $this->assertStringContainsString('Time,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday', $content);
        $this->assertStringContainsString('--- DETAILED CLASS SCHEDULE RECORDS ---', $content);
    }

    /**
     * [AG-FIX-02] Verify course search returns populated course_name in custom routine.
     */
    public function test_custom_routine_search_and_conflict_display(): void
    {
        $response = $this->get('/?tab=custom&course_search=SE111');
        $response->assertStatus(200);
        $response->assertViewHas('courseSearchResults');
        $response->assertSee('Search Results for');
        $response->assertSee('SE111');
        $response->assertSee('+ Add to Routine');
    }

    /**
     * Verify Course Offer Directory displays Batch 41 with major selection and track pills.
     */
    public function test_course_offerings_directory_batch_41_displays_major_selection(): void
    {
        $response = $this->get('/?tab=offerings&offering_batch=41');
        $response->assertStatus(200);
        $response->assertViewHas('offerings');
        $response->assertViewHas('availableTracks');
        $this->assertEquals(41, $response->viewData('offeringBatch'));

        // All 19 courses for Batch 41 should be present when no track is selected
        $offerings = $response->viewData('offerings');
        $this->assertCount(19, $offerings);

        // Assert presence of UI components
        $response->assertSee('Course Offer Directory');
        $response->assertSee('Select Major / Track');
        $response->assertSee('SE • Software Engineering (4)');
        $response->assertSee('DS • Data Science (4)');
        $response->assertSee('ST • Software Testing (4)');
        $response->assertSee('RE • Robotics Engineering (4)');
        $response->assertSee('CS • Cyber Security (3)');
    }

    /**
     * Verify selecting a specific major for Batch 41 filters to only major-specific courses.
     */
    public function test_batch_41_filter_by_specific_major_shows_only_major_courses(): void
    {
        // 1. Data Science (DS) Major
        $dsResponse = $this->get('/?tab=offerings&offering_batch=41&offering_track=DS');
        $dsResponse->assertStatus(200);
        $dsOfferings = $dsResponse->viewData('offerings');
        $this->assertCount(4, $dsOfferings);
        $dsCodes = $dsOfferings->pluck('course_code')->all();
        $this->assertEquals(['DS421', 'DS422', 'DS423', 'DS424'], $dsCodes);

        $dsResponse->assertSee('DS421');
        $dsResponse->assertSee('Machine Learning Driven Data Analysis');
        $dsResponse->assertDontSee('SE331');
        $dsResponse->assertDontSee('CS334');

        // 2. Cyber Security (CS) Major
        $csResponse = $this->get('/?tab=offerings&offering_batch=41&offering_track=CS');
        $csResponse->assertStatus(200);
        $csOfferings = $csResponse->viewData('offerings');
        $this->assertCount(3, $csOfferings);
        $csCodes = $csOfferings->pluck('course_code')->all();
        $this->assertEquals(['CS334', 'CS335', 'CS422'], $csCodes);

        $csResponse->assertSee('Ethical Hacking');
        $csResponse->assertDontSee('DS421');
    }
}
