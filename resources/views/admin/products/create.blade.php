@extends('layouts.admin.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if(session('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                <h3>
                    Product
                </h3>
                <a href="{{route('product.index')}}" class="btn btn-secondary btn-sm float-end">Back</a>
            </div>
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane" type="button" role="tab" aria-controls="seo-tab-pane" aria-selected="false">SEO TAGS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">Product Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="category" class="">Select Cagtegory</label>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}" class="form-control">{{$category->name}}</option>
                                            @endforeach
                                            @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 ">
                                        <label for="category" class="">Select Brand</label>
                                        <select name="brand" id="" class="form-control">
                                            @foreach ($brands as $brand)
                                            <option value="{{$brand->name}}" class="form-control">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="name">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control">
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="">Small Description</label><br>
                                <textarea name="small_description" id="" rows="4" class="form-control"></textarea>
                                @error('small_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label><br>
                                <textarea name="description" id="" rows="4" class="form-control"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Meta Title</label><br>
                                <input type="text" name="meta_title" class="form-control">
                                @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="">Meta Keyword</label><br>
                                <textarea name="meta_keyword" id="" rows="4" class="form-control"></textarea>
                                @error('meta_keyword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="">Meta Description</label><br>
                                <textarea name="meta_description" id="" rows="4" class="form-control"></textarea>
                                @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="tab-pane fade" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Original Price</label>
                                        <input type="number" name="original_price" class="form-control">
                                        @error('original_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">selling Price</label>
                                        <input type="number" name="selling_price" class="form-control">
                                        @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" class="form-control">
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" style="width:50px; height:20px;">
                                        @error('trending')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" style="width:50px; height:20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="">Product Image</label>
                                <input type="file" multiple name="image[]" id="" class="form-control">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3 mt-3">
                                <label for="" >Select Color</label>
                                <hr/>
                                <div class="row">
                                    @forelse ($colors as $color)
                                    <div class="col-md-3 ">
                                        <div class="p-2 border mb-3">
                                            color: <input type="checkbox" name="colors[{{$color->id}}]" value="{{$color->id}}" id="">{{$color->name}} <br>
                                            Quantity: <input type="number" name="colorquantity[{{$color->id}}]"  style="width:70px; height:20px; border: 1px solid;">
                                        </div>
                                       
                                    </div>
                                  
                                    @empty
                                    <div>
                                        <h5>NO data </h5>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-secondary ">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('custom_js')
<script>
    $(document).ready(function() {
        $("#name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(Text);
        });
    });

    $(document).ready(function() {
        $('.description').summernote();
    });

</script>

@endsection
