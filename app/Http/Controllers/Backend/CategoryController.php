<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Admin\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
         $category = Category::create($request->except('image','status'));

         if ($request->hasFile('image')) {

         $this->fileUpload($category, 'image', 'category-image', false);
         }
           $category->status=$request->status == true ? '1':'0';
           $category->save();

         return redirect()->route('category.index')->with('message', 'Category Created Successfully!');
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
    public function edit(Category  $category)
    {
        return view('admin.category.edit',[
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,Category $category)
    {
    
         $category->update($request->except('image','status'));

         if ($request->hasFile('image')) {
         if (!is_null($category->image)) {
              Storage::delete('public/category-image/' . $category->image);
         $this->fileUpload($category, 'image', 'category-image', true);
         }
         $this->fileUpload($category, 'image', 'category-image', false);
         }
         $category->status=$request->status == true ? '1':'0';
         $category->update();

           return redirect()->route('category.index')->with('message', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
