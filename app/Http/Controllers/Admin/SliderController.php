<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Admin\Slider;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index',[
            'sliders'=>Slider::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = Slider::create($request->except('image','status'));

        if ($request->hasFile('image')) {

        $this->fileUpload($slider, 'image', 'slider-image', false);
        }
        $slider->status=$request->status == true ? '1':'0';
        $slider->save();

        return redirect()->route('sliders.index')->with('message', 'Slider Created Successfully!');
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',[
            'slider'=>$slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $slider->update($request->except('image','status'));

        if ($request->hasFile('image')) {

        if (!is_null($slider->image)) {

        Storage::delete('public/slider-image/' . $slider->image);

        $this->fileUpload($slider, 'image', 'slider-image', true);
        }
        $this->fileUpload($slider, 'image', 'slider-image', false);
        }
        $slider->status=$request->status == true ? '1':'0';
        $slider->update();

        return redirect()->route('sliders.index')->with('message', 'Slider Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(isset($slider->image)!=null){
        Storage::delete('public/slider-image/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('sliders.index')->with('error', 'Slider Deleted Successfully!');

    }
}
