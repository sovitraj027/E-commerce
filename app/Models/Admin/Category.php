<?php

namespace App\Models\Admin;

use App\Models\Backend\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status'

    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function brands()
    {
        return $this->hasMany(Brand::class,'category_id','id')->where('status','1');
    }
}
