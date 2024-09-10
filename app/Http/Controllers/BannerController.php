<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['banner'] = BannerModel::find(1);
        return view('backend.pages.banner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->storeOrUpdate($request, $id);
        return redirect()->route('banners.edit', 1);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function storeOrUpdate(Request $request, $id){
        $company = BannerModel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'notification' => $request->notification,
                'button' => $request->button,
                'link' => $request->link,
            ]
        );
        $this->upload_file($request->image, $company, 'image', 'upload/banners_image');
        return $company;
    }
}
