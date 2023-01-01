@extends('layouts.admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Category
                    </h3>
                    <a href="{{route('category.index')}}" class="btn-secondary float-end">Add Category</a>
                </div>
            </div>
        </div>
    </div>

@endsection