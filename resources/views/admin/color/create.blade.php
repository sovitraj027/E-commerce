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
                    Create Color
                </h3>
                <a href="{{route('color.index')}}" class="btn btn-secondary btn-sm float-end">Back</a>
            </div>

            <div class="card-body">
               <form action="{{route('color.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>

                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" style="height:50px; width:20px;">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary float-end">Save</button>
               </form>
            
            </div>
        </div>
    </div>
</div>
@endsection