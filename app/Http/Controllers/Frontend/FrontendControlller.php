<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class FrontendControlller extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'sliders' => Slider::where('status', 1)->get()
        ]);
    }

    public function categories()
    {
        return view('frontend.collections.category.index', [
            'categories' => Category::where('status', 1)->get()
        ]);
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            return view('frontend.collections.product.index', [
                'products' => $category->products()->get(),
                'category' => $category
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '1')->first();

            if ($product) {
                return view('frontend.collections.product.view', [
                    'product' => $product,
                    'category' => $category
                ]);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
