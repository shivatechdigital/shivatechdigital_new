<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_opening_id')->constrained('job_openings')->cascadeOnDelete();
            $table->string('name');
            $table->string('address');
            $table->string('phone', 30);
            $table->string('email');
            $table->string('resume_path');
            $table->string('status')->default('submitted');
            $table->text('admin_note')->nullable();
            $table->timestamps();

            $table->index(['job_opening_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
