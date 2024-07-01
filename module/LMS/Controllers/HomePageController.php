<?php

namespace Module\LMS\Controllers;

use App\Models\BannerModel;
use App\Models\CompanyModel;
use App\Models\PartnerModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\LMS\Models\CourseModel;

class HomePageController extends Controller
{
    private $service;


    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

    }












    /*
     |--------------------------------------------------------------------------
     | INDEX METHOD
     |--------------------------------------------------------------------------
    */
    public function index()
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | CREATE METHOD
     |--------------------------------------------------------------------------
    */
    public function create()
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | STORE METHOD
     |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | SHOW METHOD
     |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | EDIT METHOD
     |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        # code...
    }













    /*
     |--------------------------------------------------------------------------
     | UPDATE METHOD
     |--------------------------------------------------------------------------
    */
    public function update($id, Request $request)
    {
        # code...
    }












    /*
     |--------------------------------------------------------------------------
     | DELETE/DESTORY METHOD
     |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        # code...
    }

    public function homePage()
    {
        $data['courses'] = CourseModel::active()->get();
        $data['banner'] = BannerModel::find(1);
        $data['partners'] = PartnerModel::all();
        return view('frontend-1.pages.homepage.homepage', $data);
    }

    public function contactPage(){
        return view('frontend-1.pages.contact.contact');
    }

    public function signUpPage(){
        $notAllowedRole = [1, 2, 5, 6];
        $roles = RoleModel::whereNotIn('id', $notAllowedRole)->get();
        return view('frontend-1.pages.authentication.sign-up', compact('roles'));
    }
}
