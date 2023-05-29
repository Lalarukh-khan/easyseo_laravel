<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    /*--------------------- Member ----------------------*/
    Route::post('/member/update_profile', 'Api\MemberController@update_profile');
    Route::post('/member/update_bio', 'Api\MemberController@update_bio');
    Route::post('/member/update_package', 'Api\MemberController@update_package');
    Route::post('/member/refer', 'Api\MemberController@refer');
    Route::any('/member/upload_media/{actions?}/{id?}', 'Api\MemberController@upload_media');
    Route::get('/member/media', 'Api\MemberController@member_files');
    Route::get('/member/referrals', 'Api\MemberController@referrals');
    Route::get('/member/counters', 'Api\MemberController@counters');
    Route::get('/member/user_profile', 'Api\MemberController@user_profile');

    /*--------------------- Talent ----------------------*/
    Route::any('/member/skills/{id?}', 'Api\TalentController@skills');
    Route::any('/member/awards/{id?}', 'Api\TalentController@awards');
    Route::any('/member/experience/{id?}', 'Api\TalentController@experience');
    Route::any('/member/projects/{id?}', 'Api\TalentController@projects');

    /*--------------------- Vendor ----------------------*/
    Route::any('/member/perks/{id?}', 'Api\VendorController@perks');
    Route::any('/member/store/{id?}', 'Api\VendorController@store');
    Route::get('/member/perks_listing/{id?}', 'Api\VendorController@perks_listing');
    Route::get('/member/perks_banner/{id?}', 'Api\VendorController@perks_banner');
    Route::get('/member/perk_detail/{id?}', 'Api\VendorController@perk_detail');

    /*--------------------- Employer ----------------------*/
    Route::any('/member/jobs/{id?}', 'Api\EmployerController@jobs');

    /*--------------------- Event ----------------------*/
    Route::get('/jobs', 'Api\JobController@listing');
    Route::get('/jobs/{.*?}', 'Api\JobController@listing');
    Route::get('/job/{slug}', 'Api\JobController@detail');

    /*--------------------- Competition ----------------------*/
    Route::post('/member/user-competition/store', 'Api\UserCompetitionController@store');
    Route::post('/member/user-competition/update', 'Api\UserCompetitionController@update');
    Route::get('/member/user-competition/delete', 'Api\UserCompetitionController@delete');
    Route::get('/member/registered-competitions', 'Api\UserCompetitionController@registries');
    Route::post('/member/user-competition/payment-store', 'Api\UserCompetitionController@payment_store');

    Route::get('/member/user-competition-file/delete', 'Api\UserCompetitionController@delete_file');
    Route::post('/member/user-competition/update-status', 'Api\UserCompetitionController@update_status');

    Route::post('/member/competition/add-vote','Api\UserCompetitionController@add_vote');
});
Route::middleware(['cors'])->group(function () {
    /*--------------------- System ----------------------*/
    Route::get('/options', 'Api\SystemController@options');
    Route::post('/member/apply_coupon', 'Api\MemberController@apply_coupon');
});
/*--------------------- Extra ----------------------*/
Route::get('/movies', 'Api\ApiController@movies');
Route::get('/movie/{slug?}', 'Api\ApiController@movie');
Route::get('/she_videos', 'Api\ApiController@she_videos');
Route::get('/she_videos/{.*?}', 'Api\ApiController@she_videos');
Route::get('/she_video/{id}', 'Api\ApiController@she_video');
Route::get('/partners', 'Api\ApiController@partners');
Route::get('/projects', 'Api\ApiController@projects_list');
Route::get('/teams', 'Api\ApiController@teams');
Route::get('/team/{id}', 'Api\ApiController@team');
Route::get('/team_tabs/{location?}', 'Api\ApiController@team_tabs');

/*--------------------- Authentication----------------------*/
Route::post('/member/registration', 'Api\AuthController@registration');
Route::post('/member/login', 'Api\AuthController@login');
Route::get('/member/logout', 'Api\AuthController@logout');
Route::post('/member/forgot', 'Api\AuthController@forgot');
Route::match(['get', 'post'], '/password/reset/{token}', 'Api\AuthController@resetPassword');
Route::post('/member/resend-opt', 'Api\AuthController@resendOtp');
Route::post('/member/verify-opt', 'Api\AuthController@verifyOtp');
Route::post('/member/expire-opt', 'Api\AuthController@expireOtp');
Route::any('/verify/{resend?}', 'Api\AuthController@verify');

Route::post('/member/forgot-password', 'Api\AuthController@forgot_password');
Route::post('/member/reset-password', 'Api\AuthController@reset_password');

/*--------------------- Member ----------------------*/
Route::post('/check-user', 'Api\MemberController@check_user');
Route::get('/pricing/{package_id?}', 'Api\MemberController@pricing');

/*--------------------- Event ----------------------*/
Route::get('/events', 'Api\EventController@listing');
Route::get('/event/download_calendar/{slug}', 'Api\EventController@download_calendar');
Route::get('/events/{.*?}', 'Api\EventController@listing');
Route::get('/event/{slug}', 'Api\EventController@detail');


/*--------------------- Talent ----------------------*/
Route::get('/talents', 'Api\TalentController@talents');
Route::get('/talents/{.*?}', 'Api\TalentController@talents');
Route::get('/talent/{id}', 'Api\TalentController@talent');
Route::any('/member/skills/fetch', 'Api\TalentController@skills');
Route::any('/member/awards/fetch', 'Api\TalentController@awards');
Route::any('/member/experience/fetch', 'Api\TalentController@experience');
Route::any('/member/projects/fetch', 'Api\TalentController@projects');


/*--------------------- Competition ----------------------*/
Route::get('/competitions', 'Api\CompetitionController@competitions');
Route::get('/competition-categories', 'Api\CompetitionController@categories');

Route::get('/competition/participants', 'Api\CompetitionController@competing_participants');
Route::get('/competition/participant-details', 'Api\CompetitionController@participant_details');

Route::get('/competition-jury', 'Api\CompetitionController@competing_jury');

/*--------------------- Vendor ----------------------*/

/*--------------------- Employer ----------------------*/
//Route::middleware('cors')->group(function () {
/*--------------------- CMS ----------------------*/
Route::get('/menu/{type?}', function ($type = 'Main Menu') {
    if ($type == 'Main Menu') {
        $JSON['left'] = \App\Http\Controllers\Api\CmsController::menu('Left Menu');
        $JSON['right'] = \App\Http\Controllers\Api\CmsController::menu('Right Menu');
    } else {
        $JSON = \App\Http\Controllers\Api\CmsController::menu($type);
    }
    return api_response(['status' => true, 'response' => $JSON]);
});

Route::get('/page/{slug?}', 'Api\CmsController@page');
Route::get('/get_block/{identifier}', 'Api\CmsController@cms_block');
Route::get('/banners', 'Api\CmsController@banners');
Route::get('/blog_posts', 'Api\CmsController@blog_posts');
Route::get('/testimonials', 'Api\CmsController@testimonials');
Route::get('/blog', 'Api\CmsController@blog_posts');
Route::get('/blog/{slug?}', 'Api\CmsController@blog_post');
Route::get('/blog_comments/{slug?}', 'Api\CmsController@blog_comments');
Route::get('/ajax/validation/{module?}/{id?}', 'Api\CmsController@validation');
Route::get('/ajax/{action?}', 'Api\CmsController@actions');
Route::get('/ajax/{action?}/{param}', 'Api\CmsController@actions');
Route::post('/do_contact', 'Api\CmsController@do_contact');
Route::post('/subscribers/{action?}', 'Api\CmsController@subscribers');
//});
/**‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
 * | API For Admin
 *‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒*/
Route::middleware(['auth', 'admin'])
    ->group(function () {
        Route::any(
            '/{controller}/{method?}/{params?}',
            function ($controller, $method = 'index', $params = null) {
                $app = app();
                $controller = Str::studly(Str::singular($controller));
                $controller_cls = "App\Http\Controllers\\" . Str::studly(env('ADMIN_DIR')) . "\\{$controller}Controller";
                if (class_exists($controller_cls)) {
                    $controller = $app->make($controller_cls);
                    try {
                        return $controller->callAction($method, ['params' => $params]);
                    } catch (Exception $e) {
                        developer_log('', $e);
                        return response()->setStatusCode(401, 'Invalid request!');
                    }
                } else {
                    return response()->setStatusCode(404, 'Not found data');
                }
            }
        )->where('params', '.*');
    });
