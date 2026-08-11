<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department')->nullable();
            $table->string('location')->default('Noida / Remote');
            $table->string('employment_type')->default('full_time');
            $table->string('experience_level')->nullable();
            $table->string('salary_range')->nullable();
            $table->text('summary')->nullable();
            $table->json('requirements')->nullable();
            $table->json('responsibilities')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
