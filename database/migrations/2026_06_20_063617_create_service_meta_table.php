<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_meta', function (Blueprint $table) {
            $table->id();
            
            // Page Identification
            $table->string('page_slug')->unique()->index(); // e.g., 'web-development', 'about'
            $table->string('page_type')->default('service'); // service|static|landing
            $table->string('page_url')->nullable(); // Full URL for reference
            
            // Basic SEO Meta
            $table->string('meta_title', 200)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->string('focus_keyword', 100)->nullable();
            $table->string('canonical_url', 500)->nullable();
            
            // Open Graph (Facebook/LinkedIn)
            $table->string('og_title', 200)->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image', 500)->nullable();
            $table->string('og_type', 50)->default('website');
            
            // Twitter Card
            $table->string('twitter_card', 50)->default('summary_large_image');
            $table->string('twitter_title', 200)->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image', 500)->nullable();
            
            // Schema Markup
            $table->longText('schema_markup')->nullable(); // JSON-LD
            $table->longText('breadcrumb_schema')->nullable();
            $table->longText('faq_schema')->nullable();
            
            // Content Meta
            $table->string('h1_tag', 200)->nullable();
            $table->text('page_description')->nullable(); // Short description for AI context
            $table->json('target_keywords')->nullable(); // Array of keywords
            
            // SEO Settings
            $table->boolean('is_indexable')->default(true);
            $table->boolean('is_followable')->default(true);
            $table->string('robots_meta', 100)->default('index, follow');
            
            // Tracking
            $table->string('last_updated_by')->default('manual'); // manual|ai|n8n
            $table->integer('seo_score')->nullable(); // 0-100
            $table->timestamp('last_optimized_at')->nullable();
            
            // Performance Stats (cached from GSC)
            $table->integer('current_clicks')->default(0);
            $table->integer('current_impressions')->default(0);
            $table->decimal('current_ctr', 5, 2)->default(0);
            $table->decimal('current_position', 5, 2)->default(0);
            $table->timestamp('stats_updated_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for performance
            $table->index('page_type');
            $table->index('last_updated_by');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_meta');
    }
};