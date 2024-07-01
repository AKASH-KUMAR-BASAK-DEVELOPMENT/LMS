<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardCourseCategoryController;
use App\Http\Controllers\DashboardCourseCOntroller;
use App\Http\Controllers\DashboardCourseLevelController;
use App\Http\Controllers\DashboardExamController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SiteConfigurationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Module\LMS\Controllers\CourseController;
use Module\LMS\Controllers\CourseEnrollmentController;
use Module\LMS\Controllers\HomePageController;

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
Route::get('/contact', [HomePageController::class, 'contactPage']);
Route::get('/sign-up-form', [HomePageController::class, 'signUpPage']);
Route::post('/sign-up', [UserController::class, 'store'])->name('sign-up');

Route::group(['middleware' => ['auth', 'role:Admin, Manager']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('company', CompanyController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('site-configuration', SiteConfigurationController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('dashboard-course-category', DashboardCourseCategoryController::class);
    Route::resource('dashboard-course-level', DashboardCourseLevelController::class);
    Route::resource('dashboard-course', DashboardCourseController::class);
    Route::resource('dashboard-exam', DashboardExamController::class);
    Route::resource('dashboard-student-enrollments', CourseEnrollmentController::class);
    Route::get('/course-enrollment-confirm/{id}', [CourseEnrollmentController::class, 'confirm']);
    Route::resource('role-permission', RolePermissionController::class);
    Route::get('/user-stats-change/{id}', [UserController::class, 'statusChange']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

