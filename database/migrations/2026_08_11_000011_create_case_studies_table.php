<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('industry')->nullable();
            $table->string('client_name')->nullable();
            $table->string('project_type')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->text('results')->nullable();
            $table->json('result_metrics')->nullable();
            $table->json('technologies')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
