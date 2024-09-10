<?php

namespace App\Http\Controllers;

use App\Models\SliderModel;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = SliderModel::paginate(10);
        return view('backend.pages.slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->storeOrUpdate($request, null);
        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['slider'] = SliderModel::find($id);
        return view('backend.pages.slider.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->storeOrUpdate($request, $id);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider= SliderModel::find($id);
        $slider->delete();
        return redirect()->route('sliders.index');
    }

    public function storeOrUpdate(Request $request , $id)
    {
        $slider = SliderModel::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'status' => 1
            ]
        );
        $this->upload_file($request->image, $slider, 'image', 'upload/slider_image');
    }
}
