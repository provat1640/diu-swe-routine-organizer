<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseOfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear previous offerings to prevent duplicate key collisions
        DB::table('course_offerings')->truncate();

        $offerings = [
            // Batch 49
            ['batch' => 49, 'major_track' => null, 'course_code' => 'SE111', 'course_name' => 'Computer Fundamentals', 'credits' => 3],
            ['batch' => 49, 'major_track' => null, 'course_code' => 'SE112', 'course_name' => 'Computer Fundamentals Lab', 'credits' => 1],
            ['batch' => 49, 'major_track' => null, 'course_code' => 'SE113', 'course_name' => 'Introduction to Software Engineering', 'credits' => 3],
            ['batch' => 49, 'major_track' => null, 'course_code' => 'ENG101', 'course_name' => 'English Reading, Writing Skills & Public Speaking/ English I', 'credits' => 3],
            ['batch' => 49, 'major_track' => null, 'course_code' => 'BNS101', 'course_name' => 'Bangladesh Studies', 'credits' => 3],

            // Batch 48
            ['batch' => 48, 'major_track' => null, 'course_code' => 'MAT101', 'course_name' => 'Math-I: Calculus & Geometry/ Mathematics I', 'credits' => 3],
            ['batch' => 48, 'major_track' => null, 'course_code' => 'SE121', 'course_name' => 'Structured Programming', 'credits' => 3],
            ['batch' => 48, 'major_track' => null, 'course_code' => 'SE122', 'course_name' => 'Structured Programming Lab', 'credits' => 1],
            ['batch' => 48, 'major_track' => null, 'course_code' => 'PHY101', 'course_name' => 'Physics: Mechanics, Electromagnetism & Waves/ Physics I', 'credits' => 3],
            ['batch' => 48, 'major_track' => null, 'course_code' => 'SE212', 'course_name' => 'Software Requirement Specifications & Analysis', 'credits' => 3],

            // Batch 47
            ['batch' => 47, 'major_track' => null, 'course_code' => 'SE213', 'course_name' => 'Digital Electronics & Logic Design', 'credits' => 3],
            ['batch' => 47, 'major_track' => null, 'course_code' => 'SE123', 'course_name' => 'Discrete Mathematics', 'credits' => 3],
            ['batch' => 47, 'major_track' => null, 'course_code' => 'MAT102', 'course_name' => 'Math-II: Linear Algebra & Fourier Analysis/ Mathematics II', 'credits' => 3],
            ['batch' => 47, 'major_track' => null, 'course_code' => 'SE131', 'course_name' => 'Data Structure', 'credits' => 3],
            ['batch' => 47, 'major_track' => null, 'course_code' => 'SE132', 'course_name' => 'Data Structure Lab', 'credits' => 1],

            // Batch 46
            ['batch' => 46, 'major_track' => null, 'course_code' => 'SE133', 'course_name' => 'Software Development Capstone Project', 'credits' => 3],
            ['batch' => 46, 'major_track' => null, 'course_code' => 'SE223', 'course_name' => 'Database Systems', 'credits' => 3],
            ['batch' => 46, 'major_track' => null, 'course_code' => 'SE224', 'course_name' => 'Database Systems Lab', 'credits' => 1],
            ['batch' => 46, 'major_track' => null, 'course_code' => 'SE222', 'course_name' => 'Computer Architecture', 'credits' => 3],
            ['batch' => 46, 'major_track' => null, 'course_code' => 'AOL101', 'course_name' => 'Art of Living', 'credits' => 3],

            // Batch 45
            ['batch' => 45, 'major_track' => null, 'course_code' => 'STA101', 'course_name' => 'Probability & Statistics in Software Engineering/ Statistics I', 'credits' => 3],
            ['batch' => 45, 'major_track' => null, 'course_code' => 'SE214', 'course_name' => 'Algorithms Design & Analysis', 'credits' => 3],
            ['batch' => 45, 'major_track' => null, 'course_code' => 'SE215', 'course_name' => 'Algorithms Design & Analysis Lab', 'credits' => 1],
            ['batch' => 45, 'major_track' => null, 'course_code' => 'SE216', 'course_name' => 'Object Oriented Programming', 'credits' => 3],
            ['batch' => 45, 'major_track' => null, 'course_code' => 'SE217', 'course_name' => 'Object Oriented Programming Lab', 'credits' => 1],
            ['batch' => 45, 'major_track' => null, 'course_code' => 'SE411', 'course_name' => 'Software Project Management & Documentation', 'credits' => 3],

            // Batch 44
            ['batch' => 44, 'major_track' => null, 'course_code' => 'STA101', 'course_name' => 'Probability & Statistics in Software Engineering/ Statistics I', 'credits' => 3],
            ['batch' => 44, 'major_track' => null, 'course_code' => 'SE232', 'course_name' => 'Operating System & System Programming', 'credits' => 3],
            ['batch' => 44, 'major_track' => null, 'course_code' => 'SE233', 'course_name' => 'Operating System & System Programming Lab', 'credits' => 1],
            ['batch' => 44, 'major_track' => null, 'course_code' => 'SE231', 'course_name' => 'System Analysis & Design Capstone Project', 'credits' => 3],
            ['batch' => 44, 'major_track' => null, 'course_code' => 'SE235', 'course_name' => 'Desktop & Web Programming', 'credits' => 3],
            ['batch' => 44, 'major_track' => null, 'course_code' => 'SE236', 'course_name' => 'Desktop & Web Programming Lab', 'credits' => 1],

            // Batch 43
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE235', 'course_name' => 'Desktop & Web Programming', 'credits' => 3],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE236', 'course_name' => 'Desktop & Web Programming Lab', 'credits' => 1],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE225', 'course_name' => 'Data Communication & Computer Networking', 'credits' => 3],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE226', 'course_name' => 'Data Communication & Computer Networking Lab', 'credits' => 1],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE311', 'course_name' => 'Design Pattern', 'credits' => 3],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE312', 'course_name' => 'Software Quality Assurance & Testing', 'credits' => 3],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'SE313', 'course_name' => 'Software Quality Assurance & Testing Lab', 'credits' => 1],
            ['batch' => 43, 'major_track' => null, 'course_code' => 'GE324', 'course_name' => 'Business Analysis & Communication', 'credits' => 3],

            // Batch 42
            ['batch' => 42, 'major_track' => null, 'course_code' => 'SE332', 'course_name' => 'Information System Security', 'credits' => 3],
            ['batch' => 42, 'major_track' => null, 'course_code' => 'SE331', 'course_name' => 'Software Engineering Design Capstone Project', 'credits' => 3],
            ['batch' => 42, 'major_track' => null, 'course_code' => 'SE333', 'course_name' => 'Artificial Intelligence', 'credits' => 3],
            ['batch' => 42, 'major_track' => null, 'course_code' => 'SE334', 'course_name' => 'Artificial Intelligence Lab', 'credits' => 1],
            ['batch' => 42, 'major_track' => null, 'course_code' => 'SE544', 'course_name' => 'Introduction to Machine Learning Guided Elective - II', 'credits' => 3],

            // Batch 41 (Specialized Majors)
            ['batch' => 41, 'major_track' => 'SE', 'course_code' => 'SE331', 'course_name' => 'Software Engineering Design Capstone Project', 'credits' => 3],
            ['batch' => 41, 'major_track' => 'SE', 'course_code' => 'SE442', 'course_name' => 'Management Information System/ Open Elective - I', 'credits' => 3],
            ['batch' => 41, 'major_track' => 'SE', 'course_code' => 'SE447', 'course_name' => 'Human Computer Interaction/ Guided Elective - IV (Non-Major Only)', 'credits' => 3],
            ['batch' => 41, 'major_track' => 'SE', 'course_code' => 'SE341', 'course_name' => 'Numerical Analysis / Guided Elective - III (Non-Major Only)', 'credits' => 3],

            ['batch' => 41, 'major_track' => 'DS', 'course_code' => 'DS421', 'course_name' => 'Machine Learning Driven Data Analysis I (DS Major)', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'DS', 'course_code' => 'DS422', 'course_name' => 'Machine Learning Driven Data Analysis Lab I (DS Major)', 'credits' => 1],
            ['batch' => 41, 'major_track' => 'DS', 'course_code' => 'DS423', 'course_name' => 'Machine Learning Driven Data Analysis II and Communicating Data Insights (DS Major)', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'DS', 'course_code' => 'DS424', 'course_name' => 'Machine Learning Driven Data Analysis II and Communicating Data Insights Lab (DS Major)', 'credits' => 1],

            ['batch' => 41, 'major_track' => 'ST', 'course_code' => 'ST421', 'course_name' => 'Testing with Generative AI', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'ST', 'course_code' => 'ST422', 'course_name' => 'Testing with Generative AI Lab', 'credits' => 1],
            ['batch' => 41, 'major_track' => 'ST', 'course_code' => 'ST423', 'course_name' => 'Software Performance Engineering and Security Testing', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'ST', 'course_code' => 'ST424', 'course_name' => 'Software Performance Engineering and Security Testing Lab', 'credits' => 1],

            ['batch' => 41, 'major_track' => 'RE', 'course_code' => 'RE411', 'course_name' => 'Embedded Systems Design & Development', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'RE', 'course_code' => 'RE412', 'course_name' => 'Embedded Systems Design & Development Lab', 'credits' => 1],
            ['batch' => 41, 'major_track' => 'RE', 'course_code' => 'RE423', 'course_name' => 'Advanced Robotics', 'credits' => 2],
            ['batch' => 41, 'major_track' => 'RE', 'course_code' => 'RE424', 'course_name' => 'Advanced Robotics Lab', 'credits' => 1],

            ['batch' => 41, 'major_track' => 'CS', 'course_code' => 'CS422', 'course_name' => 'Digital Forensic', 'credits' => 3],
            ['batch' => 41, 'major_track' => 'CS', 'course_code' => 'CS334', 'course_name' => 'Ethical Hacking & Countermeasures', 'credits' => 1],
            ['batch' => 41, 'major_track' => 'CS', 'course_code' => 'CS335', 'course_name' => 'Ethical Hacking & Countermeasures LAB', 'credits' => 2],

            // Batch 40 (Graduating Seniors)
            ['batch' => 40, 'major_track' => 'SE', 'course_code' => 'SE441', 'course_name' => 'Software Engineering Professional Ethics', 'credits' => 3],
            ['batch' => 40, 'major_track' => 'SE', 'course_code' => 'SE411', 'course_name' => 'Software Project Management & Documentation', 'credits' => 3],

            // University Core (UC) / Special Curriculum Offerings
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE211', 'course_name' => 'Object Oriented Concepts', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE221', 'course_name' => 'Object Oriented Design', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE234', 'course_name' => 'Theory of Computing', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE321', 'course_name' => 'Software Engineering Web Application', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE322', 'course_name' => 'Software Engineering Web Application Lab', 'credits' => 1],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE323', 'course_name' => 'Database Systems', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'SE532', 'course_name' => 'Introduction to Robotics', 'credits' => 3],
            ['batch' => 0, 'major_track' => 'UC', 'course_code' => 'GE235', 'course_name' => 'Principles of Accounting, Business & Economics', 'credits' => 3],
        ];

        $now = now();
        $records = array_map(function ($item) use ($now) {
            return array_merge($item, [
                'semester' => 'Fall',
                'year' => '2026',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }, $offerings);

        DB::table('course_offerings')->insert($records);
    }
}
