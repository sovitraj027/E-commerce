@extends('layouts.admin.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                
                    <h3>
                        Color List
                    </h3>
                    <a href="{{route('color.create')}}" class="btn btn-primary btn-sm float-end">Add Color</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($colors as $colors)
                            <tr>
                                <td>{{$colors->id}}</td>
                                <td>{{$colors->name}}</td>
                                <td>{{$colors->code}}</td>
                                <td>{{$colors->status == '1' ? 'Hidden':'visible'}}</td>
                                <td>
                                    <a href="{{route('color.edit',$colors->id)}}" class="btn btn-primary flex-end">Edit</a>
                                    <a href="{{Route('color.delete',$colors->id)}}" onclick="return confirm('Are you sure you want to delete this colors?')"
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