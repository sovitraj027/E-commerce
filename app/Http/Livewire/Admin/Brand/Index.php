<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Admin\Category;
use App\Models\Backend\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $name,$slug,$status,$brand_id,$category_id;


    public  function rules(){
         return [
             'name'=>'required|string',
             'slug'=>'required|string',
             'status'=>'nullable',
             'category_id'=>'required|integer'
         ];
     }
     public function resetInput(){
         $this->name=null;
         $this->slug=null;
         $this->status=null;
         $this->category_id=null;

     }

    public function storeBrand(){
       
         $validateData=$this->validate();

         Brand::create(
             [
                 'name'=>$this->name,
                 'slug'=>Str::slug($this->slug),
                 'status'=>$this->status==true ? '1':'0',
                 'category_id'=>$this->category_id,
             ]
         );
         session()->flash('message','Brand created Successfully');
         $this->resetInput();

    }


    public function deleteBrand( $brand_id ){
       
        $this->brand_id=$brand_id;

    }

    public function destroyBrand(){
        $brand=Brand::find($this->brand_id);
        $brand->delete();
        session()->flash('message','Brand delete successfully!');

    }
   
    public function editBrand(int $brand_id){
        $this->brand_id=$brand_id;
        $brand=Brand::find($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;
    }


    public function updateBrand(){
        $validateData=$this->validate();

        Brand::FindorFail($this->brand_id)->update(
        [
        'name'=>$this->name,
        'slug'=>Str::slug($this->slug),
        'status'=>$this->status==true ? '1':'0',
        'category_id'=>$this->category_id,

        ]
        );
        session()->flash('message','Brand created Successfully');
        $this->resetInput();
    }

    public function render()
    {
        $categories=Category::where('status',1)->get();
        $brands=Brand::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.brand.index',[
            'brands'=>$brands,
            'categories'=>$categories
        ])
                        ->extends('layouts.admin.admin')
                        ->section('content');
    }
}
