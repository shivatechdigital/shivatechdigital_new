<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\WebServiceContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;

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
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Http\Controllers\Admin\SubscriberController;

/*===========================================
| Correct Route
===========================================*/

Route::redirect('/about-us', '/about', 301);
Route::redirect('/contact.html', '/contact', 301);
Route::get('/faq', fn()=>view('website.pages.faq'))->name('faq');

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
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/pricing', fn()=>view('website.pages.pricing'))->name('pricing');
Route::get('/privacy-policy', fn()=>view('website.pages.privacy-policy'))->name('privacy-policy');
Route::get('/terms-of-service', fn()=>view('website.pages.terms-of-service'))->name('terms-of-service');
Route::post('/service-contact-submit',[WebServiceContactController::class,'submit'])->name('servicecontact.submit');

// BLOG
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/search/live',[BlogController::class,'liveSearch'])->name('blog.search.live');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::get('/category/{slug}',[BlogController::class,'category'])->name('blog.category');
Route::get('/tag/{slug}',[BlogController::class,'tag'])->name('blog.tag');

// Comment System
Route::post('/post/{post}/comment',[CommentController::class,'store'])->name('comment.store');
Route::delete('/comment/{comment}',[CommentController::class,'destroy'])->name('comment.destroy');

// Newsletter
Route::post('/newsletter/subscribe', [NewsletterController::class,'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class,'unsubscribe'])->name('newsletter.unsubscribe');

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
    if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->hasPermission('dashboard.view'))) 
    { 
        return redirect()->route('index'); 
        
    } 
    return redirect('/'); 
    
})->middleware(['auth','verified'])->name('dashboard');

// OR ADMIN DASHBOARD PAGE
Route::middleware(['auth', 'admin'])->group(function(){

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->middleware('permission:dashboard.view')
        ->name('admin.dashboard');
    Route::get('/index', [AnalyticsController::class, 'dashboard'])
        ->middleware('permission:dashboard.view')
        ->name('index');
    Route::get('/admin/search-console', [AnalyticsController::class, 'searchConsoleDetails'])
        ->middleware('permission:dashboard.view')
        ->name('admin.analytics.search-console');

    Route::get('/admin/gsc-inspect', [AnalyticsController::class, 'gscInspectPage'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect');
    Route::get('/admin/gsc-inspect/load', [AnalyticsController::class, 'gscLoadResults'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.load');
    Route::post('/admin/gsc-inspect/save', [AnalyticsController::class, 'gscSaveResults'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.save');
    Route::delete('/admin/gsc-inspect/clear', [AnalyticsController::class, 'gscClearResults'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.clear');
    Route::post('/admin/gsc-inspect/single', [AnalyticsController::class, 'gscInspectSingle'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.single');
    Route::post('/admin/gsc-inspect/live-test', [AnalyticsController::class, 'gscLiveTest'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.live-test');
    Route::post('/admin/gsc-inspect/request-indexing', [AnalyticsController::class, 'gscRequestIndexing'])
        ->middleware('permission:dashboard.view')
        ->name('admin.gsc.inspect.request-indexing');


/*===========================================
| SETTINGS & SITE DETAILS
===========================================*/

    Route::get('/settings',[SettingController::class,'index'])
        ->middleware('permission:sitedetails.manage')
        ->name('settings.index');
    Route::post('/settings',[SettingController::class,'update'])
        ->middleware('permission:sitedetails.manage')
        ->name('settings.update');
    Route::post('/settings/reset',[SettingController::class,'reset'])
        ->middleware('permission:sitedetails.manage')
        ->name('settings.reset');

    Route::get('/sitedetails',[SettingController::class,'index'])
        ->middleware('permission:sitedetails.manage')
        ->name('sitedetails');

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

    Route::get('/admin/profile', [ProfileController::class, 'edit'])
        ->name('admin.profile.edit');
    Route::put('/admin/profile', [ProfileController::class, 'update'])
        ->name('admin.profile.update');

    Route::get('/admin/notifications', [NotificationController::class, 'index'])
        ->name('admin.notifications.index');
    Route::get('/admin/notifications/{notificationId}', [NotificationController::class, 'open'])
        ->name('admin.notifications.open');
    Route::post('/admin/notifications/read-all', [NotificationController::class, 'readAll'])
        ->name('admin.notifications.read-all');


/*===========================================
| CONTACT MANAGEMENT
===========================================*/

    Route::get('/contacts',[ContactManagementController::class,'index'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.index');
    Route::get('/contacts/{contact}',[ContactManagementController::class,'show'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.show');
    Route::put('/contacts/{contact}/status',[ContactManagementController::class,'updateStatus'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.status');
    Route::put('/contacts/{contact}/notes',[ContactManagementController::class,'updateNotes'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.notes');
    Route::delete('/contacts/{contact}',[ContactManagementController::class,'destroy'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.destroy');

    Route::post('/contacts/bulk-delete',[ContactManagementController::class,'bulkDelete'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.bulk-delete');
    Route::post('/contacts/bulk-status',[ContactManagementController::class,'bulkUpdateStatus'])
        ->middleware('permission:contacts.manage')
        ->name('contacts.bulk-status');


/*===========================================
| ABOUT PAGE MANAGEMENT
===========================================*/

    Route::get('/admin/about/',[AboutPageController::class,'index'])
        ->middleware('permission:about.manage')
        ->name('about.index');
    Route::post('/admin/about/update',[AboutPageController::class,'update'])
        ->middleware('permission:about.manage')
        ->name('about.update');

    Route::post('/admin/about/team/store',[AboutPageController::class,'storeTeamMember'])
        ->middleware('permission:about.manage')
        ->name('about.team.store');
    Route::put('/admin/about/team/{teamMember}',[AboutPageController::class,'updateTeamMember'])
        ->middleware('permission:about.manage')
        ->name('about.team.update');
    Route::delete('/admin/about/team/{teamMember}',[AboutPageController::class,'deleteTeamMember'])
        ->middleware('permission:about.manage')
        ->name('about.team.delete');

    Route::post('/admin/about/timeline/store',[AboutPageController::class,'storeTimeline'])
        ->middleware('permission:about.manage')
        ->name('about.timeline.store');
    Route::put('/admin/about/timeline/{timeline}',[AboutPageController::class,'updateTimeline'])
        ->middleware('permission:about.manage')
        ->name('about.timeline.update');
    Route::delete('/admin/about/timeline/{timeline}',[AboutPageController::class,'deleteTimeline'])
        ->middleware('permission:about.manage')
        ->name('about.timeline.delete');

    Route::post('/admin/about/value/store',[AboutPageController::class,'storeCoreValue'])
        ->middleware('permission:about.manage')
        ->name('about.value.store');
    Route::put('/admin/about/value/{coreValue}',[AboutPageController::class,'updateCoreValue'])
        ->middleware('permission:about.manage')
        ->name('about.value.update');
    Route::delete('/admin/about/value/{coreValue}',[AboutPageController::class,'deleteCoreValue'])
        ->middleware('permission:about.manage')
        ->name('about.value.delete');


/*===========================================
| BLOG ADMIN
===========================================*/

    Route::resource('/admin/categories',CategoryController::class)
        ->names('admin.categories');
    Route::delete('/admin/categories/bulk-delete', [CategoryController::class, 'bulkDelete'])
        ->middleware('permission:categories.delete')
        ->name('admin.categories.bulk-delete');
    Route::post('/admin/categories/import', [CategoryController::class, 'import'])
        ->middleware('permission:categories.create')
        ->name('admin.categories.import');
    Route::get('/admin/categories/export', [CategoryController::class, 'export'])
        ->middleware('permission:categories.view')
        ->name('admin.categories.export');
    Route::delete('/admin/tags/bulk-delete', [TagController::class, 'bulkDelete'])
        ->middleware('permission:tags.delete')
        ->name('admin.tags.bulk-delete');
    Route::resource('/admin/tags',TagController::class)
        ->names('admin.tags');
    Route::resource('/admin/posts',PostController::class)
        ->names('admin.posts');
    Route::post('/admin/posts/{post}/toggle-publish', [BlogPostController::class, 'togglePublish'])
        ->middleware('permission:posts.update')
        ->name('admin.posts.toggle-publish');
    Route::post('/admin/posts/{post}/toggle-featured', [BlogPostController::class, 'toggleFeatured'])
        ->middleware('permission:posts.update')
        ->name('admin.posts.toggle-featured');
    Route::post('/admin/posts/{post}/duplicate', [BlogPostController::class, 'duplicate'])
        ->middleware('permission:posts.delete')
        ->name('admin.posts.duplicate');
    Route::post('/admin/upload-image', [BlogPostController::class, 'uploadImage'])
        ->middleware('permission:posts.update')
        ->name('admin.upload.image');
    Route::post('/admin/posts/bulk-action', [BlogPostController::class, 'bulkAction'])
        ->middleware('permission:posts.update')
        ->name('admin.posts.bulk-action');


/*===========================================
| SERVICE CONTACT
===========================================*/

    Route::delete('/admin/servicecontact/bulk-delete',[ServiceContractController::class,'bulkDelete'])
        ->middleware('permission:servicequeries.delete')
        ->name('admin.servicecontact.bulk-delete');
    Route::post('/admin/servicecontact/{servicecontact}/toggle-status',[ServiceContractController::class,'toggleStatus'])
        ->middleware('permission:servicequeries.resolve')
        ->name('admin.servicecontact.toggle-status');
    Route::resource('/admin/servicecontact',ServiceContractController::class)->names('admin.servicecontact');


/*===========================================
| COMMENTS - ADMIN
===========================================*/

    Route::get('/admin/comments',[AdminCommentController::class,'index'])
        ->middleware('permission:comments.view')
        ->name('admin.comments.index');
    Route::delete('/admin/comments/bulk-delete',[AdminCommentController::class,'bulkDelete'])
        ->middleware('permission:comments.delete')
        ->name('admin.comments.bulk-delete');
    Route::get('/admin/comments/{comment}/reply',[AdminCommentController::class,'createReply'])
        ->middleware('permission:comments.reply')
        ->name('admin.comments.reply.create');
    Route::post('/admin/comments/{comment}/reply',[AdminCommentController::class,'storeReply'])
        ->middleware('permission:comments.reply')
        ->name('admin.comments.reply.store');
    Route::get('/admin/comments/{comment}/reply/{reply}/edit',[AdminCommentController::class,'editReply'])
        ->middleware('permission:comments.reply')
        ->name('admin.comments.reply.edit');
    Route::put('/admin/comments/{comment}/reply/{reply}',[AdminCommentController::class,'updateReply'])
        ->middleware('permission:comments.reply')
        ->name('admin.comments.reply.update');
    Route::post('/admin/comments/{comment}/approve',[AdminCommentController::class,'approve'])
        ->middleware('permission:comments.reply')
        ->name('admin.comments.approve');
    Route::delete('/admin/comments/{comment}',[AdminCommentController::class,'destroy'])
        ->middleware('permission:comments.delete')
        ->name('admin.comments.destroy');
    
    
/*===========================================
| PARTNERS - ADMIN
===========================================*/    
        Route::get('/admin/partners', [PartnerController::class, 'index'])
            ->middleware('permission:partners.view')
            ->name('partners.index');
    
    Route::get('/admin/partners/create', [PartnerController::class, 'create'])
        ->middleware('permission:partners.create')
        ->name('partners.create');

    Route::post('/admin/partners', [PartnerController::class, 'store'])
        ->middleware('permission:partners.create')
        ->name('partners.store');

    Route::get('/admin/partners/{partner}/edit', [PartnerController::class, 'edit'])
        ->middleware('permission:partners.update')
        ->name('partners.edit');

    Route::put('/admin/partners/{partner}', [PartnerController::class, 'update'])
        ->middleware('permission:partners.update')
        ->name('partners.update');

    Route::delete('/admin/partners/bulk-delete', [PartnerController::class, 'bulkDelete'])
        ->middleware('permission:partners.delete')
        ->name('partners.bulk-delete');
    Route::delete('/admin/partners/{partner}', [PartnerController::class, 'destroy'])
        ->middleware('permission:partners.delete')
        ->name('partners.destroy');

/*===========================================
| USERS, ROLES, PERMISSIONS
===========================================*/

    Route::get('/admin/users/roles', [RoleController::class, 'index'])
        ->middleware('permission:roles.manage')
        ->name('admin.roles.index');
    Route::post('/admin/users/roles', [RoleController::class, 'store'])
        ->middleware('permission:roles.manage')
        ->name('admin.roles.store');
    Route::get('/admin/users/roles/{role}/edit', [RoleController::class, 'edit'])
        ->middleware('permission:roles.manage')
        ->name('admin.roles.edit');
    Route::put('/admin/users/roles/{role}', [RoleController::class, 'update'])
        ->middleware('permission:roles.manage')
        ->name('admin.roles.update');

    Route::get('/admin/users/permissions', [RolePermissionController::class, 'index'])
        ->middleware('permission:permissions.manage')
        ->name('admin.permissions.index');
    Route::post('/admin/users/permissions/{role}', [RolePermissionController::class, 'update'])
        ->middleware('permission:permissions.manage')
        ->name('admin.permissions.update');

    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->middleware('permission:users.view')
        ->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])
        ->middleware('permission:users.create')
        ->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])
        ->middleware('permission:users.create')
        ->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])
        ->middleware('permission:users.update')
        ->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])
        ->middleware('permission:users.update')
        ->name('admin.users.update');
    Route::post('/admin/users/{user}/reset-password', [AdminUserController::class, 'resetPassword'])
        ->middleware('permission:users.reset_password')
        ->name('admin.users.reset-password');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])
        ->middleware('permission:users.delete')
        ->name('admin.users.destroy');

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

    Route::get('/gsc/dashboard', [AnalyticsController::class, 'searchConsoleDashboard'])->name('gsc.dashboard');
    
    
    Route::get('{any}', function () {
        return redirect('/');
    })->where('any', '.*\.html');

/*===========================================
| TESTIMONIALS
===========================================*/
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])
        ->middleware('permission:testimonials.view')
        ->name('admin.testimonials.index');
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])
        ->middleware('permission:testimonials.create')
        ->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])
        ->middleware('permission:testimonials.create')
        ->name('admin.testimonials.store');
    Route::get('/admin/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])
        ->middleware('permission:testimonials.update')
        ->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{testimonial}', [TestimonialController::class, 'update'])
        ->middleware('permission:testimonials.update')
        ->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])
        ->middleware('permission:testimonials.delete')
        ->name('admin.testimonials.destroy');

/*===========================================
| PORTFOLIO PROJECTS
===========================================*/
    Route::get('/admin/portfolio', [PortfolioProjectController::class, 'index'])
        ->middleware('permission:portfolio.view')
        ->name('admin.portfolio.index');
    Route::get('/admin/portfolio/create', [PortfolioProjectController::class, 'create'])
        ->middleware('permission:portfolio.create')
        ->name('admin.portfolio.create');
    Route::post('/admin/portfolio', [PortfolioProjectController::class, 'store'])
        ->middleware('permission:portfolio.create')
        ->name('admin.portfolio.store');
    Route::get('/admin/portfolio/{portfolio}/edit', [PortfolioProjectController::class, 'edit'])
        ->middleware('permission:portfolio.update')
        ->name('admin.portfolio.edit');
    Route::put('/admin/portfolio/{portfolio}', [PortfolioProjectController::class, 'update'])
        ->middleware('permission:portfolio.update')
        ->name('admin.portfolio.update');
    Route::delete('/admin/portfolio/{portfolio}', [PortfolioProjectController::class, 'destroy'])
        ->middleware('permission:portfolio.delete')
        ->name('admin.portfolio.destroy');

/*===========================================
| NEWSLETTER SUBSCRIBERS
===========================================*/
    Route::get('/admin/subscribers', [SubscriberController::class, 'index'])
        ->middleware('permission:subscribers.manage')
        ->name('admin.subscribers.index');
    Route::delete('/admin/subscribers/{subscriber}', [SubscriberController::class, 'destroy'])
        ->middleware('permission:subscribers.manage')
        ->name('admin.subscribers.destroy');
    Route::get('/admin/subscribers/export', [SubscriberController::class, 'exportCsv'])
        ->middleware('permission:subscribers.manage')
        ->name('admin.subscribers.export');

});
