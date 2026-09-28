<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('academic_routines', function (Blueprint $table): void {
            $table->index(['day_of_week', 'start_time', 'end_time'], 'routines_time_lookup_idx');
            $table->index(['teacher_initials', 'day_of_week', 'start_time'], 'routines_teacher_lookup_idx');
            $table->index(['classroom_no', 'building', 'day_of_week', 'start_time'], 'routines_room_lookup_idx');
            $table->index(['course_id', 'batch', 'section'], 'routines_course_lookup_idx');
        });
    }

    public function down(): void
    {
        Schema::table('academic_routines', function (Blueprint $table): void {
            $table->dropIndex('routines_time_lookup_idx');
            $table->dropIndex('routines_teacher_lookup_idx');
            $table->dropIndex('routines_room_lookup_idx');
            $table->dropIndex('routines_course_lookup_idx');
        });
    }
};
