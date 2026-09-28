<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('course_offerings')) {
            Schema::create('course_offerings', function (Blueprint $table) {
                $table->id();
                $table->string('semester', 20)->default('Fall');
                $table->string('year', 4)->default('2026');
                $table->integer('batch');
                $table->string('major_track', 10)->nullable();
                $table->string('course_code', 20);
                $table->string('course_name', 150);
                $table->integer('credits')->default(3);
                $table->timestamps();
                $table->unique(['semester', 'year', 'batch', 'major_track', 'course_code'], 'idx_offering_unique');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('course_offerings');
    }
};
