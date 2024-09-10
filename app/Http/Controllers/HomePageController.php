<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\PartnerModel;
use App\Models\RoleModel;
use App\Models\SliderModel;
use App\Models\VisitorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Module\LMS\Models\CourseModel;

class HomePageController extends Controller
{
    public function homePage(Request $request)
    {
//        $data['courses'] = CourseModel::active()->get();
//        $data['banner'] = BannerModel::find(1);
//        $data['partners'] = PartnerModel::all();
        $data = Cache::remember('homePageData', 60, function () {
            return [
                'courses' => CourseModel::active()->with('courseCategory')->get(),
                'banner' => BannerModel::find(1),
                'partners' => PartnerModel::all(),
                'sliders' => SliderModel::all()
            ];
        });
        $this->visitorHit($request);
        return view('frontend.pages.homepage.homepage2', compact('data'), $data);
    }

    public function contactPage(){
        return view('frontend.pages.contact.contact');
    }

    public function signUpPage(){
        if (Auth::check()){
            return redirect()->back();
        }
        $notAllowedRole = [1, 2, 5, 6];
        $roles = RoleModel::whereNotIn('id', $notAllowedRole)->get();
        return view('frontend.pages.authentication.sign-up', compact('roles'));
    }

    public function visitorHit($request){
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');
        $referer = $request->header('Referer');
        $languages = $request->header('Accept-Language');
        $host = $request->header('Host');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        VisitorModel::create([
            'ip' => $ipAddress,
            'agent' => $userAgent,
            'refer' => $referer,
            'language' => $languages,
            'host' => $host,
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
    }
}
