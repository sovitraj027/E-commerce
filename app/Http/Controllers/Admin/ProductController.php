<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\ProductColor;
use App\Models\Admin\ProductImage;
use App\Models\Backend\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'brands' => Brand::latest()->get(),
            'categories' => Category::latest()->get(),
            'colors'=>Color::where('status','1')->get()
        ]);
    }

    public function store(ProductRequest $request)
    {

        $category = Category::findOrFail($request['category_id']);

        $product = $category->products()->create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'brand' => $request['brand'],
            'category_id' => $request['category_id'],
            'small_description' => $request['small_description'],
            'description' => $request['description'],
            'selling_price' => $request['selling_price'],
            'original_price' => $request['original_price'],
            'quantity' => $request['quantity'],
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'meta_title' => $request['meta_title'],
            'meta_keyword' => $request['meta_keyword'],
            'meta_description' => $request['meta_description'],

        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extension;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        if($request->colors){
           foreach($request->colors as $key=>$color){
            $product->productColors()->create([
                'product_id'=>$product->id,
                'color_id'=>$color,
                'quantity'=>$request->colorquantity[$key] ?? 0
            ]);
           }
        }
        return redirect()->route('product.index')->with('message', 'Product Create Successfully!');
    }


    public function edit(Product $product){

        $productcolorId=$product->productColors()->pluck('color_id')->toArray();
        $colors = Color::WhereNotIn('id',$productcolorId)->get();
        return view('admin.products.edit', [
            'product' => $product,
            'brands' => Brand::latest()->get(),
            'categories' => Category::latest()->get(),
            'colors' => Color::WhereNotIn('id',$productcolorId)->get()
        ]);
    }


    public function update(ProductRequest $request, $product_id)
    {

        $product = Category::findOrFail($request['category_id'])->products()
        ->where('id',$product_id)->first();

        if($product){
            $product->update([
                'name' => $request['name'],
                'slug' => $request['slug'],
                'brand' => $request['brand'],
                'category_id' => $request['category_id'],
                'small_description' => $request['small_description'],
                'description' => $request['description'],
                'selling_price' => $request['selling_price'],
                'original_price' => $request['original_price'],
                'quantity' => $request['quantity'],
                'status' => $request->status == true ? '1' : '0',
                'trending' => $request->trending == true ? '1' : '0',
                'meta_title' => $request['meta_title'],
                'meta_keyword' => $request['meta_keyword'],
                'meta_description' => $request['meta_description'],
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
               if($request->colors){
               foreach($request->colors as $key=>$color){
               $product->productColors()->create([
               'product_id'=>$product->id,
               'color_id'=>$color,
               'quantity'=>$request->colorquantity[$key] ?? 0
               ]);
               }
               }
            return redirect()->route('product.index')->with('info', 'Product Updated Successfully!');

        }
        else{
            return redirect()->route('product.index')->with('error','No Data Found');
        }


    }

    public  function deleteImage(int $product_image_id){

        $productImage=ProductImage::FindOrFail($product_image_id);
        if(File::exists($productImage->image)){

            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('error','Image Deleted Successfully');
    }

    public function delteProduct($product_id){

        $product=Product::FindOrFail($product_id);
        if ($product->productImages()){
            foreach ($product->productImages as $image){
                if(File::exists($image->image)){
                   $test= File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->route('product.index')->with('message','Product Deleted Successfully');
    }



    public function productColorQty(Request $request, $product_color_id){
       $productColorData=Product::findOrFail($request->product_id)
       ->productColors()->where('id',$product_color_id)->first();
       $productColorData->update([
        'quantity'=>$request->qty,
       ]
       );
       return response()->json(['message'=>'color quantity is updated']);

    }

    public function deleteColor($product_color_id){
        $prod_col_data=ProductColor::findOrFail($product_color_id);
        $prod_col_data->delete();
       return response()->json(['message'=>'Product Color Deleted Successfully!']);

    }
}
