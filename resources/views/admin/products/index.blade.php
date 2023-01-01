@extends('layouts.admin.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                
                <h3>
                    Product
                </h3>
                <a href="{{route('product.create')}}" class="btn btn-primary btn-sm float-end">Add Product</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->status == '1' ? 'Hidden':'visible'}}</td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary flex-end">Edit</a>
                                    <a href="{{Route('product.delete',$product->id)}}" onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="btn btn-danger flex-end">Delete</a>
                                </td>
                            </tr>
                        @empty
                        <td><h5>No Data at the moment</h5></td>
                            
                        @endforelse
                        
                     
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
 @endsection