<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            
            // Page Header Section
            $table->string('page_badge')->default('About ShivaTechDigital');
            $table->string('page_title')->default('Transforming Businesses Through Innovation');
            $table->text('page_subtitle')->nullable();
            
            // Stats Section
            $table->integer('years_experience')->default(15);
            $table->integer('projects_delivered')->default(250);
            $table->integer('team_members_count')->default(50);
            
            // About Content Section
            $table->string('section_label')->default('Who We Are');
            $table->string('section_title')->default('We Create Digital Excellence');
            $table->text('lead_text')->nullable();
            $table->longText('description')->nullable();
            $table->string('about_image')->nullable();
            
            // Highlights
            $table->string('highlight_1_icon')->default('fas fa-award');
            $table->string('highlight_1_title')->default('Award-Winning');
            $table->string('highlight_1_text')->default('50+ industry awards');
            
            $table->string('highlight_2_icon')->default('fas fa-users');
            $table->string('highlight_2_title')->default('Expert Team');
            $table->string('highlight_2_text')->default('50+ specialists');
            
            $table->string('highlight_3_icon')->default('fas fa-globe');
            $table->string('highlight_3_title')->default('Global Reach');
            $table->string('highlight_3_text')->default('30+ countries');
            
            // Founder Section
            $table->string('founder_label')->default('Message from our Founder');
            $table->string('founder_name')->default('Shweta Singh');
            $table->string('founder_title')->default('Founder & CEO, SivaTechDigital');
            $table->string('founder_image')->nullable();
            $table->longText('founder_message')->nullable();
            
            // Mission & Vision
            $table->text('mission_text')->nullable();
            $table->text('vision_text')->nullable();
            
            // CTA Section
            $table->string('cta_title')->default('Want to Join Our Team?');
            $table->string('cta_subtitle')->default("We're always looking for talented individuals to join our growing team");
            
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
