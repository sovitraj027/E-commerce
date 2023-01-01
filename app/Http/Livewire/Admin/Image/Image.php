<?php

namespace App\Http\Livewire\Admin\Image;

use App\Models\Admin\ProductImage;
use Livewire\Component;

class Image extends Component
{
   public $image_id;
    
    public function destroyImage( $image_id){
        dd('her');
    $this->image_id=$image_id;
    $image=ProductImage::FindOrFail($this->image_id);
    $image->delete();
    session()->flash('message','Category delete successfully!');

    }

    public function render()
    {
        return view('livewire.admin.image.image');

    }
}
