<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


Auth::routes(['verify' => true]);

//admin2 page
// Route::view('/admin-dashboard', 'admin2.content.dashboard.dashboards-analytics');
// Route::view('/admin-crm', 'admin2.content.dashboard.dashboards-crm');
Route::get('/', function () {
    return redirect('https://easyseo.ai');
});
//admin auth routes
Route::middleware(['auth:admin', 'XSS'])->prefix('admin')->as('admin.')->namespace('App\Http\Controllers\Administrator')->group(function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('/contact-list', 'DashboardController@contactList')->name('contact_list');

    Route::prefix('setting')->as('setting.')->group(function () {
        Route::get('/', 'SettingController@index')->name('add');
        Route::post('/', 'SettingController@save')->name('save');
    });
    Route::prefix('template')->as('template.')->group(function () {

        Route::prefix('category')->as('category.')->group(function () {
            Route::get('/all', 'TemplateCategoryController@index')->name('all');
            Route::post('/save', 'TemplateCategoryController@save')->name('save');
            Route::get('/update-status/{id}', 'TemplateCategoryController@status_update')->name('status');
            Route::get('/delete/{id}', 'TemplateCategoryController@delete')->name('delete');

            Route::get('/sorting', 'TemplateCategoryController@sorting')->name('sorting');
            Route::post('/sorting/save', 'TemplateCategoryController@sorting_save')->name('sorting.save');
        });


        // template sorting category wise
        Route::get('/sorting/{id}', 'TemplateController@sorting')->name('sorting');
        Route::post('/sorting/save', 'TemplateController@sorting_save')->name('sorting.save');


        Route::get('/all', 'TemplateController@index')->name('all');
        Route::get('/add', 'TemplateController@add')->name('add');
        Route::post('/save', 'TemplateController@save')->name('save');
        Route::post('/test-save', 'TemplateController@test_save')->name('test_save');
        Route::get('/edit/{id}', 'TemplateController@edit')->name('edit');
        Route::get('/delete/{id}', 'TemplateController@delete')->name('delete');
        Route::get('/update-status/{id}', 'TemplateController@status_update')->name('status');
        Route::get('/test/{id}', 'TemplateController@test_template')->name('test');
        Route::post('/test-form-submit', 'TemplateController@test_form_submit')->name('test_form_submit');
    });
    Route::prefix('report')->as('report.')->group(function(){
        Route::get('/requests','ReportController@index')->name('requests');
        Route::get('/get-report','ReportController@get_report')->name('get_report');
        Route::get('/user-requests','ReportController@user_requests')->name('user-requests');
    });

    Route::prefix('blog')->as('blog.')->group(function () {
        // blog category route
        Route::get('/category', 'BlogController@all_category')->name('category.all');
        Route::post('/category/add', 'BlogController@save_category')->name('category.add');
        Route::get('/category/edit/{id}', 'BlogController@edit_category')->name('category.edit');
        Route::get('/category/delete/{id}', 'BlogController@delete_category')->name('category.delete');
        // blog category route
        // blog route
        Route::get('/all', 'BlogController@all_blog')->name('all');
        Route::get('/add', 'BlogController@add_blog')->name('add');
        Route::post('/save', 'BlogController@save_blog')->name('save');
        Route::get('/edit/{id}', 'BlogController@edit_blog')->name('edit');
        Route::get('/delete/{id}', 'BlogController@delete_blog')->name('delete');
        // blog route
    });
    Route::prefix('admin-users')->as('admin-users.')->group(function(){
        Route::get('/','AdminUserController@index')->name('all');
        Route::get('/add','AdminUserController@add')->name('add');
        Route::get('/edit/{id}','AdminUserController@edit')->name('edit');
        Route::post('/save','AdminUserController@save')->name('save');
        Route::post('/update-password','AdminUserController@password_update')->name('update_password');
        Route::get('/delete/{id}','AdminUserController@delete_user')->name('delete');
    });
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/all', 'UserController@index')->name('all');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::post('/update', 'UserController@update')->name('update');
        Route::post('/update-subscription', 'UserController@update_subscription')->name('update_subscription');
        Route::get('/delete/{id}', 'UserController@delete')->name('delete');
    });
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', 'DashboardController@edit_profile')->name('edit');
        Route::post('/update', 'DashboardController@update_profile')->name('update');
    });
});
//admin auth routes
Route::prefix('admin')->middleware('XSS')->controller(AdminLoginController::class)->as('admin.')->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/login', 'login')->name('login.submit');
});
// //admin auth routes
// Route::prefix('manager')->middleware('XSS')->controller(AdminLoginController::class)->as('admin.')->group(function () {
//     Route::get('/login', 'showLoginForm')->name('login');
//     Route::post('/logout', 'logout')->name('logout');
//     Route::post('/login', 'login')->name('login.submit');
// });

Route::middleware('XSS')->as('web.')->namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/privacy-policy', 'PageController@privacy')->name('privacy');
    Route::get('/about-us', 'PageController@about_us')->name('about_us');
    Route::get('/contact-us', 'PageController@contact_us')->name('contact_us');
    Route::get('/pricing', 'PageController@pricing')->name('pricing');
    Route::get('/faqs', 'PageController@index')->name('faqs');
    Route::get('/term-of-services', 'PageController@terms')->name('terms');
    Route::get('/cancellation-&-refund-policy', 'PageController@cancellation_policy')->name('cancellation_policy');
    Route::get('/prohibited-content-policy', 'PageController@prohibited_content_policy')->name('prohibited_content_policy');

    Route::post('/submit-contact', 'ContactUsController@contactSave')->name('contact.submit');

    Route::get('/blogs', 'PageController@blogs')->name('blog.all');
    Route::get('/blog/get-by-cat', 'PageController@get_blog_by_cat')->name('blog.get_by_cat');
    Route::get('/blog-details/{slug}', 'PageController@blog_details')->name('blog.details');

    Route::get('/cookie-policy', 'PageController@cookie_policy')->name('cookie_policy');
});


Route::middleware(['auth:admin', 'XSS'])->prefix('oldadmin')->as('oldadmin.')->namespace('App\Http\Controllers\OldAdministrator')->group(function () {
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('/contact-list', 'DashboardController@contactList')->name('contact_list');

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', 'DashboardController@edit_profile')->name('edit');
        Route::post('/update', 'DashboardController@update_profile')->name('update');
    });

    Route::prefix('setting')->as('setting.')->group(function () {
        Route::get('/', 'SettingController@index')->name('add');
        Route::post('/', 'SettingController@save')->name('save');
    });

    Route::prefix('template')->as('template.')->group(function () {

        Route::prefix('category')->as('category.')->group(function () {
            Route::get('/all', 'TemplateCategoryController@index')->name('all');
            Route::post('/save', 'TemplateCategoryController@save')->name('save');
            Route::get('/update-status/{id}', 'TemplateCategoryController@status_update')->name('status');
            Route::get('/delete/{id}', 'TemplateCategoryController@delete')->name('delete');

        });

        Route::get('/all', 'TemplateController@index')->name('all');
        Route::get('/add', 'TemplateController@add')->name('add');
        Route::post('/save', 'TemplateController@save')->name('save');
        Route::post('/test-save', 'TemplateController@test_save')->name('test_save');
        Route::get('/edit/{id}', 'TemplateController@edit')->name('edit');
        Route::get('/delete/{id}', 'TemplateController@delete')->name('delete');
        Route::get('/update-status/{id}', 'TemplateController@status_update')->name('status');
        Route::get('/test/{id}', 'TemplateController@test_template')->name('test');
        Route::post('/test-form-submit', 'TemplateController@test_form_submit')->name('test_form_submit');
    });

    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/all', 'UserController@index')->name('all');
        Route::get('/edit/{id}', 'UserController@edit')->name('edit');
        Route::post('/update', 'UserController@update')->name('update');
    });

    Route::prefix('blog')->as('blog.')->group(function () {
        // blog category route
        Route::get('/category', 'BlogController@all_category')->name('category.all');
        Route::post('/category/add', 'BlogController@save_category')->name('category.add');
        Route::get('/category/edit/{id}', 'BlogController@edit_category')->name('category.edit');
        Route::get('/category/delete/{id}', 'BlogController@delete_category')->name('category.delete');
        // blog category route
        // blog route
        Route::get('/all', 'BlogController@all_blog')->name('all');
        Route::get('/add', 'BlogController@add_blog')->name('add');
        Route::post('/save', 'BlogController@save_blog')->name('save');
        Route::get('/edit/{id}', 'BlogController@edit_blog')->name('edit');
        Route::get('/delete/{id}', 'BlogController@delete_blog')->name('delete');
        // blog route
    });

    Route::prefix('report')->as('report.')->group(function(){
        Route::get('/requests','ReportController@index')->name('requests');
        Route::get('/get-report','ReportController@get_report')->name('get_report');
        Route::get('/user-requests','ReportController@user_requests')->name('user-requests');
    });

    Route::prefix('admin-users')->as('admin-users.')->group(function(){
        Route::get('/','AdminUserController@index')->name('all');
        Route::get('/add','AdminUserController@add')->name('add');
        Route::get('/edit/{id}','AdminUserController@edit')->name('edit');
        Route::post('/save','AdminUserController@save')->name('save');
        Route::post('/update-password','AdminUserController@password_update')->name('update_password');
        Route::get('/delete/{id}','AdminUserController@delete_user')->name('delete');
    });
});


// web user auth routes start
Route::namespace('App\Http\Controllers\Auth')->group(function () {

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');

    Route::middleware(['XSS'])->prefix('auth')->as('auth.')->group(function () {

        Route::post('/login/submit', 'LoginController@login')->name('login.submit');
        Route::post('/logout', 'LoginController@logout')->name('logout');

        Route::post('/register/submit', 'RegisterController@register')->name('register.submit');

        Route::prefix('social')->as('social.')->group(function () {
            Route::get('/redirect/{provider}', 'SocialController@redirectToProvider')->name('redirect');
            // Route::get('/{provider}/callback', 'SocialController@handleProviderCallback')->name('callback');
        });
        // Route::get('/{provider}/callback', 'SocialController@handleProviderCallback')->name('callback');
    });
    Route::get('easyseo/public/auth/social/google/callback', 'SocialController@handleProviderCallback')->name('callback');
});
// web user auth routes end

// routes for forget and reset password
Route::prefix('auth')->namespace('App\Http\Controller\Auth')->controller('ForgotPasswordController')->group(function(){ 
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password-email', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}/{hash}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

// user verify routes

Route::middleware('XSS')->as('verification.')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email')->with('title', 'Verify Email');
    })->middleware('auth:web')->name('notice');

    // Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //     $request->fulfill();
    //     return redirect(route('user.dashboard'));
    // })->middleware(['auth:web', 'signed'])->name('verify');

    // Route::post('/email/verification-notification', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->with('message', 'Verification link sent!');
    // })->middleware(['auth:web', 'throttle:6,1'])->name('send');

    
    Route::get('/email-verify/{id}', function (Request $request) {
        $user = User::hashidFind($request->id);
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('user.dashboard');
    })->middleware(['auth:web'])->name('verify');


    Route::post('/email/verification-notification', function (Request $request) {
        // $request->user()->sendEmailVerificationNotification();
        $mailHtml = view('email.verify-email',['user'=>$request->user()])->render();
        mailGunSendMail($mailHtml,'Email Verification',$request->user()->email);
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth:web', 'throttle:6,1'])->name('send'); 
});


// end user verify routes

// web user routes start
Route::prefix('user')->as('user.')->middleware(['auth:web', 'XSS', 'is_active', 'verified'])->namespace('App\Http\Controllers\Frontend')->group(function () {
    Route::any('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/requests', 'DashboardController@index')->name('requests');
    });
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/', 'DashboardController@edit_profile')->name('edit');
        Route::post('/update', 'DashboardController@update_profile')->name('update');
    });

    Route::get('/current-plain','DashboardController@subscription')->name('subscription');
    Route::get('/cencel-plain/{id}','DashboardController@concelSubscription')->name('cencel-subscription');

    Route::get('/help','HelpController@index')->name('help');

    Route::get('/settings','SettingController@index')->name('settings');

    Route::prefix('template')->as('template.')->group(function () {
        Route::get('/all', 'TemplateController@index')->name('all');
        Route::get('/search', 'TemplateController@search')->name('search');
        Route::get('/load-more-by-cat', 'TemplateController@load_more_by_cat')->name('load_more_by_cat');
        Route::get('/make/{id}', 'TemplateController@template_view')->name('make');
        Route::post('/form_submit', 'TemplateController@form_submit')->name('form_submit');
        Route::post('/seo_form_submit', 'TemplateController@seo_form_submit')->name('seo_form_submit');
    });

    Route::prefix('editor')->as('editor.')->group(function () {
        Route::get('/', 'EditorController@index')->name('all');
        Route::get('/create', 'EditorController@create')->name('create');
        Route::get('/keywords', 'EditorController@keywords')->name('keywords');
        Route::post('/ai_response', 'EditorController@ai_response')->name('ai_response');
        Route::post('/saveEditor', 'EditorController@saveEditor')->name('saveEditor');
        Route::post('/changeEditor', 'EditorController@changeEditor')->name('changeEditor');
        Route::get('/document/{id}', 'EditorController@document')->name('document');
        Route::get('/delete/{id}', 'EditorController@delete')->name('delete');
    });

    Route::group([
        'prefix' => 'history',
        'as' => 'history.'
    ],function(){
        Route::get('/','HistoryController@index')->name('all');
    });

    Route::prefix('chat')->as('chat.')->group(function(){
        Route::get('/', 'ChatController@index')->name('index');
        Route::post('/post', 'ChatController@res')->name('post');
        Route::post('/ai_response', 'ChatController@ai_response')->name('ai_response');
    });

    Route::prefix('billing')->as('billing.')->group(function(){
        Route::get('/','BillingController@index')->name('all');
    });

    Route::prefix('keyword-suggestion')->as('keyword-suggestion.')->group(function(){
        Route::get('/','KeywordResearchController@index')->name('index');
        Route::post('/find','KeywordResearchController@find_keywords')->name('find_keywords');
        Route::get('/get-languages','KeywordResearchController@get_languages')->name('get_languages');
        Route::get('/report/{id}','KeywordResearchController@keyword_report')->name('report');
        Route::get('/delete/{id}','KeywordResearchController@delete')->name('delete');
    });

    Route::prefix('invite')->as('invite.')->group(function(){
        Route::get('/','InvitationController@index')->name('all');
        Route::post('/send-invite','InvitationController@send_invitation')->name('send_invitation');
        Route::get('/delete/{id}','InvitationController@delete')->name('delete');
    });
});


// webhook routes
Route::prefix('webhook')->namespace('App\Http\Controllers')->group(function () {
    Route::any('/payment-handler', 'WebhookController@payment_handler');
});
