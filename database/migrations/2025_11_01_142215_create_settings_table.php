<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            // Basic Site Information
            $table->string('site_name')->default('My Website');
            $table->string('site_tagline')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_icon')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_phone')->nullable();
            $table->text('site_address')->nullable();
            $table->string('site_url')->nullable();
            $table->text('site_description')->nullable();
            
            // Social Media Links
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
            
            // Additional Settings
            $table->string('og_image')->nullable();
            $table->text('footer_text')->nullable();
            $table->string('timezone')->default('UTC');
            $table->enum('site_status', ['active', 'maintenance', 'offline'])->default('active');
            
            // SEO Settings
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('google_verification')->nullable();
            
            // Contact & Business Info
            $table->string('whatsapp_number')->nullable();
            $table->string('support_email')->nullable();
            $table->text('business_hours')->nullable();
            $table->text('google_map_embed')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};