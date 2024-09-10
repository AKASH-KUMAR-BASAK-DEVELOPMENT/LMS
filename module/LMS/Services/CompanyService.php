<?php

namespace Module\LMS\Services;

use App\Models\CompanyModel;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class CompanyService
{
    use FileSaver;

    public function storeOrUpdate(Request $request, $id){
        $company = CompanyModel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request->name,
                'title' => $request->title,
                'url' => $request->url,
                'address' => $request->address,
                'phone_primary' => $request->phone_primary,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'phone_secondary' => $request->phone_secondary,
                'email' => $request->email,
                'facebook_page_link' => $request->facebook_page_link,
                'instagram_link' => $request->instagram_link,
                'twitter_link' => $request->twitter_link,
                'linkedin_link' => $request->linkedin_link,
                'google_map_link' => $request->google_map_link,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'copyright' => $request->copyright,
            ]
        );
        $this->upload_file($request->logo, $company, 'logo', 'upload/company_logo');
        $this->upload_file($request->footer_logo, $company, 'footer_logo', 'upload/company_footer_logo');
        $this->upload_file($request->favicon, $company, 'favicon', 'upload/company_favicon');
        return $company;
    }
}
