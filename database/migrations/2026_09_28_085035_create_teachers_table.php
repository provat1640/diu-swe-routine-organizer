<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('initials', 10)->unique();
            $table->string('full_name');
            $table->string('designation');
            $table->string('contact_info')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('teachers'); }
};
