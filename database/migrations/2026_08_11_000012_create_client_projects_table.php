<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('project_type')->nullable();
            $table->string('status')->default('planning');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->date('start_date')->nullable();
            $table->date('estimated_delivery_date')->nullable();
            $table->timestamp('last_updated_at')->nullable();
            $table->text('client_note')->nullable();
            $table->json('milestones')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['user_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_projects');
    }
};
