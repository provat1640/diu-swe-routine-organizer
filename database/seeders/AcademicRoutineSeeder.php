<?php

namespace Database\Seeders;

use App\Models\AcademicRoutine;
use App\Services\CourseIntegrationService;
use App\Services\FacultyService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class AcademicRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $xlsxPath = base_path('swe-routine-fall-2026-studentversion04-4b80406fe1.xlsx');

        if (! file_exists($xlsxPath)) {
            $this->command->error("Routine Excel file not found at: {$xlsxPath}");

            return;
        }

        $zip = new ZipArchive;
        if ($zip->open($xlsxPath) !== true) {
            $this->command->error("Failed to open XLSX archive: {$xlsxPath}");

            return;
        }

        // 1. Read shared strings
        $sharedStrings = [];
        $stringsXml = $zip->getFromName('xl/sharedStrings.xml');
        if ($stringsXml !== false) {
            $xml = simplexml_load_string($stringsXml);
            if ($xml !== false) {
                foreach ($xml->si as $si) {
                    $text = '';
                    if (isset($si->t)) {
                        $text .= (string) $si->t;
                    }
                    if (isset($si->r)) {
                        foreach ($si->r as $r) {
                            $text .= (string) $r->t;
                        }
                    }
                    $sharedStrings[] = $text;
                }
            }
        }

        // 2. Read sheet1
        $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');
        $zip->close();

        if ($sheetXml === false) {
            $this->command->error('Failed to read xl/worksheets/sheet1.xml');

            return;
        }

        $xml = simplexml_load_string($sheetXml);
        if ($xml === false) {
            $this->command->error('Failed to parse sheet XML');

            return;
        }

        $slots = [
            ['c_col' => 'B', 't_col' => 'C', 'start' => '08:30:00', 'end' => '10:00:00'],
            ['c_col' => 'D', 't_col' => 'E', 'start' => '10:00:00', 'end' => '11:30:00'],
            ['c_col' => 'F', 't_col' => 'G', 'start' => '11:30:00', 'end' => '13:00:00'],
            ['c_col' => 'H', 't_col' => 'I', 'start' => '13:00:00', 'end' => '14:30:00'],
            ['c_col' => 'J', 't_col' => 'K', 'start' => '14:30:00', 'end' => '16:00:00'],
            ['c_col' => 'L', 't_col' => 'M', 'start' => '16:00:00', 'end' => '17:30:00'],
        ];

        $days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $currentDay = null;
        $routines = [];
        $distinctTeachers = [];
        $distinctClassrooms = [];
        $distinctCourses = [];

        $now = now();

        foreach ($xml->sheetData->row as $row) {
            $rowIdx = (int) $row['r'];
            if ($rowIdx < 6) {
                continue;
            }

            $cells = [];
            foreach ($row->c as $c) {
                $ref = (string) $c['r'];
                preg_match('/^([A-Z]+)/', $ref, $matches);
                $col = $matches[1] ?? '';

                $type = (string) $c['t'];
                $val = (string) $c->v;

                if ($type === 's' && $val !== '' && isset($sharedStrings[(int) $val])) {
                    $val = $sharedStrings[(int) $val];
                }

                $cells[$col] = trim($val);
            }

            $colA = $cells['A'] ?? '';
            foreach ($days as $dayName) {
                if (strcasecmp($dayName, $colA) === 0) {
                    $currentDay = $dayName;

                    continue 2;
                }
            }

            if (! $currentDay || empty($colA)) {
                continue;
            }

            // Room normalization (e.g. "Annex - 106" -> "Annex-106")
            $room = preg_replace('/Annex\s*-\s*/i', 'Annex-', $colA);
            $building = AcademicRoutine::resolveBuilding($room);

            if (! isset($distinctClassrooms[$room])) {
                $distinctClassrooms[$room] = [
                    'room_no' => $room,
                    'building' => $building,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            foreach ($slots as $slot) {
                $cVal = $cells[$slot['c_col']] ?? '';
                $tVal = $cells[$slot['t_col']] ?? '';

                if (empty($cVal)) {
                    continue;
                }

                $cValClean = preg_replace('/-+/', '-', $cVal);
                $parts = explode('-', $cValClean);
                if (count($parts) < 3) {
                    continue;
                }

                $courseId = strtoupper(trim($parts[0]));
                $batchStr = strtoupper(trim($parts[1]));
                $batch = is_numeric($batchStr) ? (int) $batchStr : 0;
                $secRaw = strtoupper(trim($parts[2]));

                $majorTrack = null;
                $section = $secRaw;

                if ($batchStr === 'UC') {
                    $majorTrack = 'UC';
                } elseif ($batch === 41) {
                    if (str_starts_with($secRaw, 'DS')) {
                        $majorTrack = 'DS';
                        $section = substr($secRaw, 2);
                    } elseif (str_starts_with($secRaw, 'CS')) {
                        $majorTrack = 'CS';
                        $section = substr($secRaw, 2);
                    } elseif (str_starts_with($secRaw, 'ST')) {
                        $majorTrack = 'ST';
                        $section = substr($secRaw, 2);
                    } elseif (str_starts_with($secRaw, 'RE')) {
                        $majorTrack = 'RE';
                        $section = substr($secRaw, 2);
                    } elseif (str_starts_with($secRaw, 'NM')) {
                        $majorTrack = 'SE';
                        $section = substr($secRaw, 2);
                    } elseif (str_starts_with($courseId, 'DS')) {
                        $majorTrack = 'DS';
                    } elseif (str_starts_with($courseId, 'CS')) {
                        $majorTrack = 'CS';
                    } elseif (str_starts_with($courseId, 'ST')) {
                        $majorTrack = 'ST';
                    } elseif (str_starts_with($courseId, 'RE')) {
                        $majorTrack = 'RE';
                    } else {
                        $majorTrack = 'SE';
                    }
                } elseif ($batch === 40) {
                    $majorTrack = 'SE';
                }

                $teacherInitials = ! empty($tVal) ? strtoupper(trim($tVal)) : 'TBA';

                if ($teacherInitials !== 'TBA' && ! isset($distinctTeachers[$teacherInitials])) {
                    $faculty = FacultyService::getFaculty($teacherInitials);
                    $fullName = $faculty['name'] ?? "Faculty Member ({$teacherInitials})";
                    $designation = $faculty['designation'] ?? 'Faculty, Dept. of SWE';

                    $distinctTeachers[$teacherInitials] = [
                        'initials' => $teacherInitials,
                        'full_name' => $fullName,
                        'designation' => $designation,
                        'contact_info' => strtolower($teacherInitials).'@daffodilvarsity.edu.bd',
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }

                if (! isset($distinctCourses[$courseId])) {
                    $courseName = CourseIntegrationService::resolveCourseName($courseId);
                    $distinctCourses[$courseId] = [
                        'course_id' => $courseId,
                        'course_name' => $courseName ?: $courseId,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }

                $routines[] = [
                    'semester' => 'Fall',
                    'year' => '2026',
                    'batch' => $batch,
                    'section' => $section,
                    'major_track' => $majorTrack,
                    'course_id' => $courseId,
                    'teacher_initials' => $teacherInitials,
                    'classroom_no' => $room,
                    'building' => $building,
                    'day_of_week' => $currentDay,
                    'start_time' => $slot['start'],
                    'end_time' => $slot['end'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // 3. Clear and insert into academic_routines
        DB::table('academic_routines')->truncate();

        foreach (array_chunk($routines, 200) as $chunk) {
            DB::table('academic_routines')->insert($chunk);
        }

        // 4. Also update classrooms, teachers, courses tables
        DB::table('classrooms')->truncate();
        if (! empty($distinctClassrooms)) {
            DB::table('classrooms')->insert(array_values($distinctClassrooms));
        }

        DB::table('teachers')->truncate();
        if (! empty($distinctTeachers)) {
            DB::table('teachers')->insert(array_values($distinctTeachers));
        }

        DB::table('courses')->truncate();
        if (! empty($distinctCourses)) {
            DB::table('courses')->insert(array_values($distinctCourses));
        }
    }
}
