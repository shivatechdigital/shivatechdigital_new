<?php

use App\Http\Controllers\Api\N8nBlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SeoController;
use App\Http\Controllers\Api\BlogDuplicateController;

Route::post('/n8n/create-post', [N8nBlogController::class, 'store'])
     ->middleware('api.token');

Route::post('/upload-base64-image', [N8nBlogController::class, 'uploadBase64Image']);

//CRM DATA
// SEO Automation Routes (for CRM)
Route::prefix('seo')->group(function () {
    // Blog Management
    Route::post('/blog/draft', [SeoController::class, 'createDraft']);
    Route::put('/blog/{id}', [SeoController::class, 'updateBlog']);
    Route::post('/blog/{id}/publish', [SeoController::class, 'publishBlog']);
    Route::get('/blog/pending', [SeoController::class, 'getPendingBlogs']);
    
    // Page Meta Management
    Route::get('/pages', [SeoController::class, 'getAllPages']);
    Route::get('/page/{slug}', [SeoController::class, 'getPage']);
    Route::put('/page/{slug}/meta', [SeoController::class, 'updatePageMeta']);
    
    // Schema Management
    Route::post('/page/{slug}/schema', [SeoController::class, 'updateSchema']);
    
    // SEO Stats
    Route::get('/stats', [SeoController::class, 'getStats']);
});


// ============================================
// SEO AUTOMATION API ROUTES
// ============================================
Route::prefix('adminseo')->middleware('api.token')->group(function () {
    
    // Health check (no auth in production, but here for consistency)
    Route::get('/health', [SeoController::class, 'health']);
    
    // Stats
    Route::get('/stats', [SeoController::class, 'getStats']);
    
    //clearCache
    Route::post('/cache/clear', [SeoController::class, 'clearCache']);
    
    // Service Pages Meta Management
    Route::prefix('pages')->group(function () {
        Route::get('/', [SeoController::class, 'getAllPages']);
        Route::post('/', [SeoController::class, 'createPage']);
    });
    
    Route::prefix('page')->group(function () {
        Route::get('/{slug}', [SeoController::class, 'getPage']);
        Route::put('/{slug}', [SeoController::class, 'updatePage']);
        Route::post('/{slug}/schema', [SeoController::class, 'updateSchema']);
    });
    
    // Blog Management
    Route::prefix('blog')->group(function () {
        Route::get('/drafts', [SeoController::class, 'getDrafts']);
        Route::post('/draft', [SeoController::class, 'createBlogDraft']);
        Route::put('/{id}', [SeoController::class, 'updateBlog']);
        Route::post('/{id}/publish', [SeoController::class, 'publishBlog']);
        Route::delete('/{id}', [SeoController::class, 'deleteBlog']);
    });
});


// ============================================
// Duplicate Content Checker
// ============================================
Route::get('/n8n/check-duplicate', [BlogDuplicateController::class, 'check']);
Route::get('/n8n/blog-slugs', [BlogDuplicateController::class, 'slugs']);