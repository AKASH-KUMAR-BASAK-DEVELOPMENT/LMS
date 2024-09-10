<?php

use App\Models\BannerModel;
use App\Models\CompanyModel;
use App\Models\PartnerModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\DB;
use Module\LMS\Models\CourseEnrolledModel;
use Module\LMS\Models\CourseModel;
use Module\LMS\Models\ExamModel;
use Module\Permission\Models\PermissionModel;

function authenticUserName() {
    return auth()->user()->name;
}

function totalUsersOfSpecificCourseEnrolled($course_id) {
    $totalUsersOfSpecificCourseEnrolled = CourseEnrolledModel::where('course_id', $course_id)
                                                                ->where('status', 1)
                                                                ->count();
    return $totalUsersOfSpecificCourseEnrolled;
}


function enrollmentStatus($course_id, $user_id)
{
    $user = User::where('id', $user_id)->first();
    if ($user->role_id == 1){
        return true;
    }
    $enrollment = CourseEnrolledModel::where('course_id', $course_id)
                                        ->where('user_id', $user_id)
                                        ->first();
    if ($enrollment && $enrollment->status == 1){
        return true;
    }
    if ($enrollment && $enrollment->status == 0){
        return 'pending';
    }
    return false;
}

function studentEnrollmentCount(){
    return CourseEnrolledModel::active()->count();
}

function courseCount(){
    return CourseModel::active()->count();
}

function partnerCount(){
    return PartnerModel::count();
}

function roleCount(){
    return RoleModel::count();
}

function userCount(){
    return User::count();
}

function examCount(){
    return ExamModel::count();
}

function studentCount(){
    return User::where('role_id', 4)->count();
}

function teacherCount(){
    return User::where('role_id', 3)->count();
}

function coursePriceSum(){
    $result = DB::select('
    SELECT SUM(courses.price) AS total_price
    FROM course_enrollments
    INNER JOIN courses ON course_enrollments.course_id = courses.id
    INNER JOIN users ON course_enrollments.user_id = users.id
    INNER JOIN roles ON users.role_id = roles.id
    WHERE roles.id = 4 AND course_enrollments.status = 1
');
    return $result[0]->total_price;
}

function banner(){
    return BannerModel::find(1);;
}

function company()
{
    return CompanyModel::find(1);
}

function rolePermissionAccess($role_id, $permission_id){
    $permissionIds = RolePermissionModel::where('role_id', $role_id)->pluck('permission_id')->toArray();
    $isChecked = in_array($permission_id, $permissionIds);
    return $isChecked;
}

function rolePermissionAccessBySlug($slug){
    if (auth()->user()->id == 1){
        return 1;
    }
    $permissionIds = RolePermissionModel::where('role_id', auth()->user()->role->id)->pluck('permission_id')->toArray();
    $permissionSlugs = PermissionModel::whereIn('id', $permissionIds)->pluck('slug')->toArray();
    $isChecked = in_array($slug, $permissionSlugs);
    return $isChecked;
}


function checkUrl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
    curl_setopt($ch, CURLOPT_FAILONERROR, true); // Fail on HTTP errors

    // Execute cURL request
    $result = curl_exec($ch);

    // Get the HTTP status code
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL handle
    curl_close($ch);

    // Check if the request was successful
    return $result !== false && $httpCode == 200;
}
