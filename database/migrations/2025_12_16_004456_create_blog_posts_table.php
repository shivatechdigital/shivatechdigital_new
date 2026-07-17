<?php
// ============================================
// MIGRATION FILE
// database/migrations/xxxx_xx_xx_create_blog_posts_table.php
// ============================================

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            
            // Foreign Keys
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            
            // Basic Information
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('author_name', 100)->nullable();
            
            // Featured Image
            $table->string('featured_image', 500)->nullable();
            $table->string('image_alt', 255)->nullable();
            
            // Statistics
            $table->integer('views')->default(0);
            $table->integer('reading_time')->default(5); // in minutes
            $table->integer('word_count')->default(0);
            
            // Publishing Options
            $table->enum('status', ['draft', 'published', 'scheduled'])->default('draft');
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('allow_comments')->default(true);
            $table->timestamp('published_at')->nullable();
            
            // SEO Fields - Meta Tags
            $table->string('meta_title', 200)->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->string('canonical_url', 500)->nullable();
            $table->string('focus_keyword', 100)->nullable();
            
            // Schema/Structured Data
            $table->string('article_type', 50)->default('BlogPosting');
            $table->string('article_section', 100)->nullable();
            
            // Open Graph / Social Media
            $table->string('og_title', 200)->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image', 500)->nullable();
            $table->string('twitter_card', 50)->default('summary_large_image');
            
            // Additional SEO
            $table->json('breadcrumbs')->nullable(); // Store breadcrumb structure
            $table->json('faq_schema')->nullable(); // Store FAQ schema data
            
            $table->timestamps();
            $table->softDeletes(); // For trash functionality
            
            // Indexes for better performance
            $table->index('slug');
            $table->index('status');
            $table->index('is_published');
            $table->index('is_featured');
            $table->index('published_at');
            $table->index('created_at');
            $table->fullText(['title', 'content', 'excerpt']); // Full-text search
        });
        
        // Pivot table for tags (many-to-many relationship)
        Schema::create('blog_post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_post_id')->constrained('blog_posts')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['blog_post_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_post_tag');
        Schema::dropIfExists('blog_posts');
    }
};