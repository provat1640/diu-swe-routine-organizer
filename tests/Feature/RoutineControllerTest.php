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
        $response->assertSee('DIU Software Engineering Department');
        $response->assertSee('Batch 49');
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

    public function test_android_sync_routine_endpoint(): void
    {
        $response = $this->getJson('/api/v1/android-sync?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'client',
            'feature',
            'meta' => ['batch', 'section', 'major_track', 'total_slots'],
            'payload',
        ]);
        $this->assertEquals('routine', $response->json('feature'));
        $this->assertEquals('Android Integration Layer', $response->json('client'));
    }

    public function test_android_sync_faculty_endpoint(): void
    {
        $response = $this->getJson('/api/v1/android-sync?teacher=DSM');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'client',
            'feature',
            'meta' => ['teacher_initials', 'total_classes'],
            'payload',
        ]);
        $this->assertEquals('faculty_search', $response->json('feature'));
    }

    public function test_android_sync_empty_rooms_endpoint(): void
    {
        $response = $this->getJson('/api/v1/android-sync?feature=empty_rooms&day_of_week=Sunday&time_slot=10:00:00 - 11:30:00');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'client',
            'feature',
            'meta' => ['day_of_week', 'start_time', 'end_time', 'total_dedicated', 'available_count', 'occupied_count'],
            'payload' => [
                '*' => ['room_no', 'building', 'status'],
            ],
        ]);
        $this->assertEquals('empty_rooms', $response->json('feature'));
    }

    public function test_android_sync_course_offerings_endpoint(): void
    {
        $response = $this->getJson('/api/v1/android-sync?feature=course_offerings&batch=49');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'client',
            'feature',
            'meta' => ['batch', 'major_track', 'total_courses'],
            'payload',
        ]);
        $this->assertEquals('course_offerings', $response->json('feature'));
    }

    public function test_weekly_routine_grid_renders_with_timetable_matrix(): void
    {
        $response = $this->get('/?batch=49&section=A&view_mode=grid');

        $response->assertStatus(200);
        $response->assertSee('Daffodil International University');
        $response->assertSee('Dept of SWE');
        $response->assertSee('Weekly Routine Matrix');
        $response->assertViewHas('weeklyGrid');
        $response->assertViewHas('viewMode', 'grid');
    }

    public function test_routine_csv_export_download(): void
    {
        $response = $this->get('/routine/export/csv?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Batch_49_Section_A_Weekly_Routine.csv"');
        $content = $response->getContent();
        $this->assertStringContainsString('Day,Start Time,End Time,Course Code,Teacher Initials,Teacher Full Name', $content);
    }

    public function test_routine_ics_calendar_export_download(): void
    {
        $response = $this->get('/routine/export/ics?batch=49&section=A');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/calendar; charset=UTF-8');
        $response->assertHeader('Content-Disposition', 'attachment; filename="DIU_SWE_Batch_49_Section_A_Weekly_Routine.ics"');
        $content = $response->getContent();
        $this->assertStringContainsString('BEGIN:VCALENDAR', $content);
        $this->assertStringContainsString('PRODID:-//Daffodil International University//SWE Weekly Routine//EN', $content);
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
}
