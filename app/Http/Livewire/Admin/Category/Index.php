<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function deleteCategory( $category_id ){
     $this->category_id=$category_id;

    }

    public function destroyCategory(){
        $category=Category::find($this->category_id);
        if(isset($category->image)!=null){
           Storage::delete('public/category-image/' . $category->image);
        }
        $category->delete();
        session()->flash('message','Category delete successfully!');

    }

    public function render()
    {
        $categories=Category::latest()->paginate(5);

        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
