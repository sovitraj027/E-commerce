<?php

namespace App\Models\Backend;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable= [
        'name',
        'slug',
        'status',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
