<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ColorRequest;
use App\Models\Admin\Color;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

use function PHPUnit\Framework\returnSelf;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.color.index',[
            'colors'=>Color::latest()->get()

        ]);

    }

    public function create(){
        return view('admin.color.create');
    }


    public function store(ColorRequest $request){
         $color = Color::create($request->except('status'));
         $color->status=$request->status == true ? '1':'0';
         $color->save();

         return redirect()->route('color.index')->with('message', 'Color Created Successfully!');
    }

    public function edit(Color $color){
        Return view('admin.color.edit',[
            'color'=>$color
        ]);
    }

    public function update(ColorRequest $request, Color $color){
          $color->update($request->except('status'));
          $color->status=$request->status == true ? '1':'0';
          $color->update();
          return redirect()->route('color.index')->with('info', 'Color Updated Successfully!');

    }

    public function destroy(Color $color){
     $color->delete();
     return redirect()->route('color.index')->with('error','Color Deleted Successfully');
    }

}
