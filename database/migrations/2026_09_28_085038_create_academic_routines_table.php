<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('academic_routines')) {
            Schema::create('academic_routines', function (Blueprint $table) {
                $table->id();
                $table->string('semester', 20)->default('Fall');
                $table->string('year', 4)->default('2026');
                $table->integer('batch');      // e.g., 49, 48, 41
                $table->string('section', 5);  // e.g., A, B, C, M
                $table->string('major_track', 10)->nullable(); // NULL for general, or 'SE','DS','RE','ST','CS'

                $table->string('course_id', 20);
                $table->string('teacher_initials', 10);
                $table->string('classroom_no', 20);
                $table->string('building', 20);

                $table->enum('day_of_week', ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday']);
                $table->time('start_time');
                $table->time('end_time');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_routines');
    }
};
