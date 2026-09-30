<?php

namespace Tests\Feature;

use App\Models\AcademicRoutine;
use App\Services\FacultyService;
use Database\Seeders\AcademicRoutineSeeder;
use Database\Seeders\CourseOfferingSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutineControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CourseOfferingSeeder::class);
        $this->seed(AcademicRoutineSeeder::class);
    }

    public function test_routine_dashboard_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Daffodil International University');
        $response->assertSee('Dept of SWE');
        $response->assertSee('Batch 49');
        $response->assertSee('--ms-blue-primary: #0078D4');
        $response->assertSee('--ms-bg-canvas: #F3F2F1');
        $response->assertDontSee('themeToggleBtn');
        $response->assertDontSee('Android Sync');
        $response->assertDontSee('Print / PDF');
        $response->assertSee('Add to Outlook (.ics)');
        $response->assertSee('Download Routine Image (PNG)');
        $response->assertSee('Export Routine Data (CSV)');
    }

    public function test_routine_filtering_by_batch_and_section(): void
    {
        $response = $this->get('/?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertViewHas('routines');
        $response->assertViewHas('batch', 49);
        $response->assertViewHas('section', 'A');
    }

    public function test_faculty_schedule_search(): void
    {
        $response = $this->get('/?faculty_initials=DSM');

        $response->assertStatus(200);
        $response->assertViewHas('facultyQuery', 'DSM');
        $response->assertViewHas('facultyRoutines');
    }

    public function test_empty_room_tracker(): void
    {
        $response = $this->get('/?tab=empty_rooms&empty_day=Saturday&empty_slot=08:30:00 - 10:00:00');

        $response->assertStatus(200);
        $response->assertViewHas('roomAnalysis');
        $analysis = $response->viewData('roomAnalysis');

        $this->assertArrayHasKey('rooms', $analysis);
        $this->assertArrayHasKey('available_count', $analysis);
        $this->assertArrayHasKey('occupied_count', $analysis);
        $this->assertCount(count(AcademicRoutine::SWE_DEDICATED_ROOMS), $analysis['rooms']);
    }

    public function test_custom_routine_toggle_and_clear(): void
    {
        $routine = AcademicRoutine::first();
        $this->assertNotNull($routine);

        // Toggle add
        $responseAdd = $this->postJson('/custom-routine/toggle', [
            'slot_id' => $routine->id,
        ]);

        $responseAdd->assertStatus(200);
        $responseAdd->assertJson([
            'status' => 'success',
            'action' => 'added',
        ]);
        $this->assertEquals([$routine->id], session('custom_routine_slots'));

        // Toggle remove
        $responseRemove = $this->postJson('/custom-routine/toggle', [
            'slot_id' => $routine->id,
        ]);

        $responseRemove->assertStatus(200);
        $responseRemove->assertJson([
            'status' => 'success',
            'action' => 'removed',
        ]);
        $this->assertEmpty(session('custom_routine_slots'));

        // Clear routine
        session(['custom_routine_slots' => [$routine->id]]);
        $responseClear = $this->postJson('/custom-routine/clear');
        $responseClear->assertStatus(200);
        $this->assertNull(session('custom_routine_slots'));
    }

    public function test_android_sync_endpoint_is_removed(): void
    {
        $response = $this->get('/api/v1/android-sync');
        $response->assertStatus(404);
    }

    public function test_weekly_routine_grid_renders_with_timetable_matrix(): void
    {
        $response = $this->get('/?batch=49&section=A&view_mode=grid');

        $response->assertStatus(200);
        $response->assertSee('Daffodil International University');
        $response->assertSee('Dept of SWE');
        $response->assertSee('weeklyRoutineContainer');
        $response->assertSee('Saturday');
        $response->assertSee('Friday');
        $response->assertSee('8:30-10:00');
        $response->assertSee('A4 Landscape');
        $response->assertViewHas('weeklyGrid');
        $response->assertViewHas('viewMode', 'grid');
    }

    public function test_routine_csv_export_download_is_well_formatted(): void
    {
        $response = $this->get('/routine/export/csv?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Batch_49_Section_A_Weekly_Routine.csv"');
        $content = $response->getContent();
        $this->assertStringStartsWith("\xEF\xBB\xBF", $content);
        $this->assertStringContainsString('Time,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday', $content);
        $this->assertStringContainsString('8:30-10:00', $content);
        $this->assertStringContainsString('SL,Day,"Time Slot","Start Time","End Time","Course Code","Course Title","Teacher Initials","Teacher Full Name",Designation,"Room No",Building,Batch,Section,Track,Semester', $content);
        $this->assertStringContainsString('Computer Fundamentals', $content);
        $this->assertStringContainsString('Fall 2026', $content);
    }

    public function test_routine_export_ics_downloads_valid_outlook_calendar(): void
    {
        $response = $this->get('/routine/export/ics?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/calendar; charset=utf-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Batch_49_Section_A_Outlook_Calendar.ics"');
        $content = $response->getContent();
        $this->assertStringContainsString('BEGIN:VCALENDAR', $content);
        $this->assertStringContainsString('PRODID:-//Daffodil International University//DIU SWE Routine Organizer//EN', $content);
        $this->assertStringContainsString('BEGIN:VEVENT', $content);
        $this->assertStringContainsString('RRULE:FREQ=WEEKLY', $content);
        $this->assertStringContainsString('SUMMARY:', $content);
        $this->assertStringContainsString('Introduction to Software Engineering', $content);
        $this->assertStringContainsString('END:VCALENDAR', $content);
    }

    public function test_faculty_service_maps_initials_to_full_names_and_designations(): void
    {
        $mak = FacultyService::getFaculty('MAK');
        $this->assertEquals('Dr. Md. Abdul Kader', $mak['name']);
        $this->assertEquals('Associate Professor', $mak['designation']);

        $aaa = FacultyService::getFaculty('AAA');
        $this->assertEquals('Md. Ashek -Al- Aziz', $aaa['name']);
        $this->assertEquals('Assistant Professor', $aaa['designation']);

        $im = FacultyService::getFaculty('IM');
        $this->assertEquals('Dr. Imran Mahmud', $im['name']);
        $this->assertEquals('Professor & Head', $im['designation']);
    }

    public function test_faculty_initial_csv_export_download(): void
    {
        $response = $this->get('/routine/export/csv?faculty_initials=MAK');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Teacher_MAK_Weekly_Routine.csv"');
        $content = $response->getContent();
        $this->assertStringStartsWith("\xEF\xBB\xBF", $content);
        $this->assertStringContainsString('Time,Saturday,Sunday,Monday,Tuesday,Wednesday,Thursday,Friday', $content);
        $this->assertStringContainsString('MAK', $content);
        $this->assertStringContainsString('Dr. Md. Abdul Kader', $content);
    }

    public function test_faculty_initial_ics_export_download(): void
    {
        $response = $this->get('/routine/export/ics?faculty_initials=MAK');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/calendar; charset=utf-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Teacher_MAK_Outlook_Calendar.ics"');
        $content = $response->getContent();
        $this->assertStringContainsString('BEGIN:VCALENDAR', $content);
        $this->assertStringContainsString('RRULE:FREQ=WEEKLY', $content);
        $this->assertStringContainsString('MAK', $content);
        $this->assertStringContainsString('END:VCALENDAR', $content);
    }

    public function test_faculty_routine_dashboard_renders_timetable_grid_and_download_actions(): void
    {
        $response = $this->get('/?tab=faculty&faculty_initials=MAK&faculty_view_mode=grid');

        $response->assertStatus(200);
        $response->assertSee('facultyWeeklyRoutineContainer');
        $response->assertSee('Download CSV');
        $response->assertSee('Download Image');
        $response->assertSee('Add to Outlook (.ics)');
        $response->assertViewHas('facultyWeeklyGrid');
    }

    public function test_api_v1_routine_endpoint(): void
    {
        $response = $this->getJson('/api/v1/routine?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'meta' => ['batch', 'section', 'total_classes'],
            'payload' => ['weekly_grid', 'has_conflicts'],
        ]);
    }

    public function test_api_v1_course_offerings_endpoint(): void
    {
        $response = $this->getJson('/api/v1/course-offerings?batch=41');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'meta' => ['batch', 'total_courses'],
            'payload',
        ]);
    }

    public function test_api_v1_faculty_schedule_endpoint(): void
    {
        $response = $this->getJson('/api/v1/faculty-schedule?faculty_initials=MAK');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'feature',
            'meta' => ['initial', 'faculty_info' => ['name', 'designation']],
            'payload',
        ]);
    }

    public function test_export_mode_css_and_dynamic_classes_rendered(): void
    {
        $response = $this->get('/?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertSee('.export-mode');
        $response->assertSee('course-code-text');
        $response->assertSee('course-title-text');
        $response->assertSee('room-text');
        $response->assertSee('TARGET_WIDTH = 1920');
        $response->assertSee('-webkit-print-color-adjust: exact');
    }
}
