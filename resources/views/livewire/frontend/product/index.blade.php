<div>
    <div class="row">
        
         <div class="col-md-3">
            @if($category->brands)
            <div class="card">
                <div class="card-header">
                    <h4>Brands</h4>
                </div>
                <div class="card-body">
                    @foreach ($category->brands as $brand)
                    <label for="" class="d-block">
                        <input type="checkbox" wire:model="brandInputs" value="{{$brand->name}}"> {{$brand->name}}
                    </label>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label for="" class="d-block">
                        <input type="radio" wire:model="priceInputs" name="priceSort" value="low-to-high">Low To High <br>
                        <input type="radio" wire:model="priceInputs" name="priceSort" value="high-to-low">High To Low
                    </label>
                </div>
            </div>
        </div>   
       
       
   <div class="col-md-9">
    <div class="row">
        @forelse($products as $key => $product)
        <div class="col-md-4">
            <div class="product-card">
                <div class="product-card-img">

                    @if($product->quantity > 0)
                    <label class="stock bg-success">In Stock</label>
                    @else
                    <label class="stock bg-danger">Out Of Stock</label>
                    @endif
                    @if($product->productImages->count()>0)
                    <a href="{{url('collections/categories/'.$product->category->slug.'/'.$product->slug)}}">
                        <img src="{{asset($product->ProductImages[0]->image)}}" alt="{{$product->name}}">
                    </a>
                    @endif
                </div>
                <div class="product-card-body">
                    <p class="product-brand">{{$product->brand}}</p>
                    <h5 class="product-name">
                        <a href="{{url('collections/categories/'.$product->category->slug.'/'.$product->slug)}}">
                            {{$product->name}}
                        </a>
                    </h5>
                    <div>
                        <span class="selling-price">${{$product->selling_price}}</span>
                        <span class="original-price">${{$product->original_price}}</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div col-md-12>
            <h5>No Products for this {{$category->name}} </h5>
        </div>

        @endforelse
    </div>
    </div>
    </div>
</div>
