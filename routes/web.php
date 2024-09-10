<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardCourseCategoryController;
use App\Http\Controllers\DashboardCourseController;
use App\Http\Controllers\DashboardCourseLevelController;
use App\Http\Controllers\DashboardExamController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SiteConfigurationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;
use Module\LMS\Controllers\CourseController;
use Module\LMS\Controllers\CourseEnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/

Route::get('/', [HomePageController::class, 'homePage']);
Route::get('/contact', [HomePageController::class, 'contactPage'])->name('contact');
Route::get('/sign-up-form', [HomePageController::class, 'signUpPage']);
Route::post('/sign-up', [UserController::class, 'store'])->name('sign-up');
Route::resource('sign-in', SigninController::class);
Route::get('/course-frontend', [CourseController::class, 'frontendCourseIndex'])->name('course-frontend');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/live-search-autofill', [SearchController::class, 'liveSearchAutofill'])->name('liveSearchAutofill');

Route::group(['middleware' => ['auth', 'role:Admin,Manager,Teacher,Student']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('company', CompanyController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('site-configuration', SiteConfigurationController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('visitors', VisitorController::class);
    Route::resource('dashboard-course-category', DashboardCourseCategoryController::class);
    Route::resource('dashboard-course-level', DashboardCourseLevelController::class);
    Route::resource('dashboard-course', DashboardCourseController::class);
    Route::resource('dashboard-exam', DashboardExamController::class);
    Route::resource('dashboard-student-enrollments', CourseEnrollmentController::class);
    Route::get('/course-enrollment-confirm/{id}', [CourseEnrollmentController::class, 'confirm']);
    Route::resource('role-permission', RolePermissionController::class);
    Route::get('/user-stats-change/{id}', [UserController::class, 'statusChange']);
    Route::get('/visitors-ip-block/{ip}', [VisitorController::class, 'visitorIpBlock']);
    Route::resource('sitemap', SitemapController::class);
    Route::resource('feature', FeatureController::class);
    Route::get('/user-profile-show/{id}', [UserProfileController::class, 'userProfile']);
    Route::post('/user-profile-update', [UserProfileController::class, 'userUpdate']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

