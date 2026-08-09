<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\WebServiceContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\Admin\ContactManagementController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Controllers\Admin\ServiceContractController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PartnerController;

/*===========================================
| Correct Route
===========================================*/

Route::redirect('/about-us', '/about', 301);
Route::redirect('/contact.html', '/contact', 301);
Route::redirect('/faq', '/contact', 301);

Route::get('/{slug}.html', function ($slug) {
    return redirect('/' . $slug, 301);
});

 Route::get('{any}', function () {
        return redirect('/');
    })->where('any', '.*\.html');
Route::redirect('/services/services', '/services/our-services', 301);


/*===========================================
| SiteMap Genertor
===========================================*/
Route::get('/sitemap.xml', function () {
    return response()->file(public_path('sitemap.xml'), [
        'Content-Type' => 'application/xml',
    ]);
});

/*===========================================
| FRONTEND ROUTES
===========================================*/



Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class,'index'])->name('about');
Route::get('/services', fn()=>view('website.pages.services'))->name('services');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
Route::get('/portfolio', fn()=>view('website.pages.portfolio'))->name('portfolio');
Route::get('/privacy-policy', fn()=>view('website.pages.privacy-policy'))->name('privacy-policy');
Route::get('/terms-of-service', fn()=>view('website.pages.terms-of-service'))->name('terms-of-service');
Route::post('/service-contact-submit',[WebServiceContactController::class,'submit'])->name('servicecontact.submit');

// BLOG
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('/category/{slug}',[BlogController::class,'category'])->name('blog.category');
Route::get('/tag/{slug}',[BlogController::class,'tag'])->name('blog.tag');

// Comment System
Route::post('/post/{post}/comment',[CommentController::class,'store'])->name('comment.store');
Route::delete('/comment/{comment}',[CommentController::class,'destroy'])->name('comment.destroy');

//services
Route::prefix('services')->name('services.')->group(function () {
    Route::get('/our-services', [ServicesController::class, 'index'])->name('index');
    Route::get('/web-development', [ServicesController::class, 'webDevelopment'])->name('web-development');

    // City-specific web development pages (SEO)
    Route::get('/web-development-noida',     [ServicesController::class, 'webDevelopmentNoida'])->name('web-development-noida');
    Route::get('/web-development-delhi',     [ServicesController::class, 'webDevelopmentDelhi'])->name('web-development-delhi');
    Route::get('/web-development-gurgaon',   [ServicesController::class, 'webDevelopmentGurgaon'])->name('web-development-gurgaon');
    Route::get('/web-development-ghaziabad', [ServicesController::class, 'webDevelopmentGhaziabad'])->name('web-development-ghaziabad');

    // City-specific mobile app development pages (SEO)
    Route::get('/mobile-app-development-noida',     [ServicesController::class, 'mobileAppDevelopmentNoida'])->name('mobile-app-noida');
    Route::get('/mobile-app-development-delhi',     [ServicesController::class, 'mobileAppDevelopmentDelhi'])->name('mobile-app-delhi');
    Route::get('/mobile-app-development-gurgaon',   [ServicesController::class, 'mobileAppDevelopmentGurgaon'])->name('mobile-app-gurgaon');
    Route::get('/mobile-app-development-ghaziabad', [ServicesController::class, 'mobileAppDevelopmentGhaziabad'])->name('mobile-app-ghaziabad');

    // City-specific cloud migration pages (SEO)
    Route::get('/cloud-migration-noida',     [ServicesController::class, 'cloudMigrationNoida'])->name('cloud-migration-noida');
    Route::get('/cloud-migration-delhi',     [ServicesController::class, 'cloudMigrationDelhi'])->name('cloud-migration-delhi');
    Route::get('/cloud-migration-gurgaon',   [ServicesController::class, 'cloudMigrationGurgaon'])->name('cloud-migration-gurgaon');
    Route::get('/cloud-migration-ghaziabad', [ServicesController::class, 'cloudMigrationGhaziabad'])->name('cloud-migration-ghaziabad');

    Route::get('/mobile-app-development', [ServicesController::class, 'mobileAppDevelopment'])->name('mobile-app');
    Route::get('/ui-ux-design', [ServicesController::class, 'uiUxDesign'])->name('ui-ux');
    Route::get('/ecommerce-development', [ServicesController::class, 'ecommerce'])->name('ecommerce');
    Route::get('/digital-marketing', [ServicesController::class, 'digitalMarketing'])->name('digital-marketing');
    Route::get('/seo-services', [ServicesController::class, 'seoServices'])->name('seo');
    Route::get('/seo', function () {
        return redirect()->route('services.seo');
    });
    Route::get('/social-media-marketing', [ServicesController::class, 'socialMedia'])->name('social-media');
    Route::get('/content-marketing', [ServicesController::class, 'contentMarketing'])->name('content');
    Route::get('/cloud-solutions', [ServicesController::class, 'cloudSolutions'])->name('cloud');
    Route::get('/maintenance-support', [ServicesController::class, 'maintenance'])->name('maintenance');
    Route::get('/branding-services', [ServicesController::class, 'branding'])->name('branding');
    Route::get('/branding-identity', function () {
        return redirect()->route('services.branding');
    });
    Route::get('/graphic-design', [ServicesController::class, 'graphicDesign'])->name('graphic-design');
    Route::get('/video-production', [ServicesController::class, 'videoProduction'])->name('video');
    Route::get('/video-marketing', function () {
        return redirect()->route('services.video');
    });
});


/*===========================================
| LOGIN SUCCESS REDIRECT PAGE
===========================================*/

Route::get('/dashboard', function () 
{ 
    if(auth()->user()->role === 'admin') 
    { 
        return redirect('/index'); 
        
    } 
    return redirect('/'); 
    
})->middleware(['auth','verified'])->name('dashboard');

// OR ADMIN DASHBOARD PAGE
Route::middleware(['auth', 'admin'])->group(function(){

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/index',fn()=>view('adminDashboard.pages.homepage'))->name('index');


/*===========================================
| SETTINGS & SITE DETAILS
===========================================*/

    Route::get('/settings',[SettingController::class,'index'])->name('settings.index');
    Route::post('/settings',[SettingController::class,'update'])->name('settings.update');
    Route::post('/settings/reset',[SettingController::class,'reset'])->name('settings.reset');

    Route::get('/sitedetails',[SettingController::class,'index'])->name('sitedetails');

    Volt::route('settings/profile','settings.profile')->name('profile.edit');
    Volt::route('settings/password','settings.password')->name('user-password.edit');
    Volt::route('settings/appearance','settings.appearance')->name('appearance.edit');
    Volt::route('settings/two-factor','settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(),'confirmPassword'),
                ['password.confirm'],
                []
            )
        )->name('two-factor.show');


/*===========================================
| CONTACT MANAGEMENT
===========================================*/

    Route::get('/contacts',[ContactManagementController::class,'index'])->name('contacts.index');
    Route::get('/contacts/{contact}',[ContactManagementController::class,'show'])->name('contacts.show');
    Route::put('/contacts/{contact}/status',[ContactManagementController::class,'updateStatus'])->name('contacts.status');
    Route::put('/contacts/{contact}/notes',[ContactManagementController::class,'updateNotes'])->name('contacts.notes');
    Route::delete('/contacts/{contact}',[ContactManagementController::class,'destroy'])->name('contacts.destroy');

    Route::post('/contacts/bulk-delete',[ContactManagementController::class,'bulkDelete'])->name('contacts.bulk-delete');
    Route::post('/contacts/bulk-status',[ContactManagementController::class,'bulkUpdateStatus'])->name('contacts.bulk-status');


/*===========================================
| ABOUT PAGE MANAGEMENT
===========================================*/

    Route::get('/admin/about/',[AboutPageController::class,'index'])->name('about.index');
    Route::post('/admin/about/update',[AboutPageController::class,'update'])->name('about.update');

    Route::post('/admin/about/team/store',[AboutPageController::class,'storeTeamMember'])->name('about.team.store');
    Route::put('/admin/about/team/{teamMember}',[AboutPageController::class,'updateTeamMember'])->name('about.team.update');
    Route::delete('/admin/about/team/{teamMember}',[AboutPageController::class,'deleteTeamMember'])->name('about.team.delete');

    Route::post('/admin/about/timeline/store',[AboutPageController::class,'storeTimeline'])->name('about.timeline.store');
    Route::put('/admin/about/timeline/{timeline}',[AboutPageController::class,'updateTimeline'])->name('about.timeline.update');
    Route::delete('/admin/about/timeline/{timeline}',[AboutPageController::class,'deleteTimeline'])->name('about.timeline.delete');

    Route::post('/admin/about/value/store',[AboutPageController::class,'storeCoreValue'])->name('about.value.store');
    Route::put('/admin/about/value/{coreValue}',[AboutPageController::class,'updateCoreValue'])->name('about.value.update');
    Route::delete('/admin/about/value/{coreValue}',[AboutPageController::class,'deleteCoreValue'])->name('about.value.delete');


/*===========================================
| BLOG ADMIN
===========================================*/

    Route::resource('/admin/categories',CategoryController::class)->names('admin.categories');
    Route::resource('/admin/tags',TagController::class)->names('admin.tags');
    Route::resource('/admin/posts',PostController::class)->names('admin.posts');
    Route::post('/admin/posts/{post}/toggle-publish', [BlogPostController::class, 'togglePublish'])->name('admin.posts.toggle-publish');
    Route::post('/admin/posts/{post}/toggle-featured', [BlogPostController::class, 'toggleFeatured'])->name('admin.posts.toggle-featured');
    Route::post('/admin/posts/{post}/duplicate', [BlogPostController::class, 'duplicate'])->name('admin.posts.duplicate');
    Route::post('/admin/upload-image', [BlogPostController::class, 'uploadImage'])->name('admin.upload.image');
    Route::post('/admin/posts/bulk-action', [BlogPostController::class, 'bulkAction'])->name('admin.posts.bulk-action');


/*===========================================
| SERVICE CONTACT
===========================================*/

    Route::resource('/admin/servicecontact',ServiceContractController::class)->names('admin.servicecontact');


/*===========================================
| COMMENTS - ADMIN
===========================================*/

    Route::get('/admin/comments',[AdminCommentController::class,'index'])->name('admin.comments.index');
    Route::post('/admin/comments/{comment}/approve',[AdminCommentController::class,'approve'])->name('admin.comments.approve');
    Route::delete('/admin/comments/{comment}',[AdminCommentController::class,'destroy'])->name('admin.comments.destroy');
    
    
/*===========================================
| PARTNERS - ADMIN
===========================================*/    
    Route::get('/admin/partners', [PartnerController::class, 'index'])
            ->name('partners.index');
    
    Route::get('/admin/partners/create', [PartnerController::class, 'create'])
        ->name('partners.create');

    Route::post('/admin/partners', [PartnerController::class, 'store'])
        ->name('partners.store');

    Route::get('/admin/partners/{partner}/edit', [PartnerController::class, 'edit'])
        ->name('partners.edit');

    Route::put('/admin/partners/{partner}', [PartnerController::class, 'update'])
        ->name('partners.update');

    Route::delete('/admin/partners/{partner}', [PartnerController::class, 'destroy'])
        ->name('partners.destroy');

/*===========================================
| GOOGLE ANALYTICS
===========================================*/

    Route::prefix('ga')->group(function(){
        Route::get('/dashboard',[AnalyticsController::class,'dashboard'])->name('ga.dashboard');
        Route::get('/realtime',[AnalyticsController::class,'realtime']);
        Route::get('/users',[AnalyticsController::class,'users']);
        Route::get('/pages',[AnalyticsController::class,'pages']);
        Route::get('/country',[AnalyticsController::class,'country']);
        Route::get('/source',[AnalyticsController::class,'source']);
        Route::get('/device',[AnalyticsController::class,'device']);
        Route::get('/monthly',[AnalyticsController::class,'monthly']);
    });
    
    
    Route::get('{any}', function () {
        return redirect('/');
    })->where('any', '.*\.html');


});
