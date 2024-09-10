<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PartnerModel;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['partners'] = PartnerModel::paginate(10);
        return view('backend.pages.partner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->storeOrUpdate($request, null);
        return redirect()->route('partners.index');
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
        $data['partner'] = PartnerModel::find($id);
        return view('backend.pages.partner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->storeOrUpdate($request, $id);
        return redirect()->route('partners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = PartnerModel::find($id);
        $partner->delete();
        return redirect()->route('partners.index');
    }

    public function storeOrUpdate(Request $request , $id)
    {
        $partner = PartnerModel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'link' => $request->link,
            ]
        );
        $this->upload_file($request->image, $partner, 'image', 'upload/partner_image');
    }
}
