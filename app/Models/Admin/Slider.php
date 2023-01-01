<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table="sliders";

    protected $fillable=[
        'title',
        'image',
        'description',
        'status'
    ];
}
