<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicRoutineSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old records to prevent duplicate key constraint blocks
        DB::table('academic_routines')->truncate();
        
        $routines = [];
        $semester = 'Fall';
        $year = '2026';

        // 1. Batches with 13 Sections (A to M)
        $batches13 =;
        $sections13 = ['A','B','C','D','E','F','G','H','I','J','K','L','M'];
        
        foreach ($batches13 as $batch) {
            foreach ($sections13 as $sec) {
                $routines[] = [
                    'semester' => $semester, 'year' => $year, 'batch' => $batch, 'section' => $sec, 'major_track' => null,
                    'course_id' => 'SE-CORE', 'teacher_initials' => 'TBA', 'classroom_no' => '612', 'building' => 'AB3',
                    'day_of_week' => 'Saturday', 'start_time' => '08:30:00', 'end_time' => '10:00:00'
                ];
            }
        }

        // 2. Batches with 14 Sections (A to N)
        $batches14 =;
        $sections14 = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];
        
        foreach ($batches14 as $batch) {
            foreach ($sections14 as $sec) {
                $routines[] = [
                    'semester' => $semester, 'year' => $year, 'batch' => $batch, 'section' => $sec, 'major_track' => null,
                    'course_id' => 'SE-ADV', 'teacher_initials' => 'MZH', 'classroom_no' => '811', 'building' => 'AB4',
                    'day_of_week' => 'Sunday', 'start_time' => '10:00:00', 'end_time' => '11:30:00'
                ];
            }
        }

        // 3. Batch 41: Specialization Track Branch (12 Sections: A to L)
        $sections41 = ['A','B','C','D','E','F','G','H','I','J','K','L'];
        $tracks41 = ['SE', 'DS', 'RE', 'ST', 'CS'];
        
        foreach ($tracks41 as $track) {
            foreach ($sections41 as $sec) {
                $routines[] = [
                    'semester' => $semester, 'year' => $year, 'batch' => 41, 'section' => $sec, 'major_track' => $track,
                    'course_id' => $track . '-SPEC', 'teacher_initials' => 'DSM', 'classroom_no' => '712A', 'building' => 'Annex',
                    'day_of_week' => 'Monday', 'start_time' => '11:30:00', 'end_time' => '01:00:00'
                ];
            }
        }

        // 4. Batch 40: Senior Project Grad Cohorts (6 Sections: A to F)
        $sections40 = ['A','B','C','D','E','F'];
        foreach ($sections40 as $sec) {
            $routines[] = [
                'semester' => $semester, 'year' => $year, 'batch' => 40, 'section' => $sec, 'major_track' => 'SE',
                'course_id' => 'SE441', 'teacher_initials' => 'ST', 'classroom_no' => '1504', 'building' => 'Main',
                'day_of_week' => 'Tuesday', 'start_time' => '02:30:00', 'end_time' => '04:00:00'
            ];
        }

        // Batch inserts to keep memory allocation low and fast in MySQL
        $chunks = array_chunk($routines, 200);
        foreach ($chunks as $chunk) {
            DB::table('academic_routines')->insert($chunk);
        }
    }
}
