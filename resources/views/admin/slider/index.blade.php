@extends('layouts.admin.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <h3>
                    slider
                </h3>
                <a href="{{route('sliders.create')}}" class="btn btn-primary btn-sm float-end">Add slider</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{substr($slider->title,0,30)}}</td>
                            <td>{{substr($slider->description, 0, 50)}}</td>
                           
                            <td>
                                @if(isset($slider->image))
                                <img src="/storage/slider-image/{{$slider->image}}" style="height: 70px; width:70px; " alt="slider">
                                @else
                                <img src="https://avatars.dicebear.com/api/adventurer-neutral/mail%40ashallendesign.co.uk.svg" alt="">
                                @endif
                            </td>
                            <td>{{$slider->status == '1' ? 'Hidden':'visible'}}</td>
                            <td>
                                <a href="{{route('sliders.edit',$slider->id)}}"
                                    class="btn btn-primary flex-end">Edit</a>
                                <a href="{{route('slider.delete',$slider->id)}}"
                                    onclick="return confirm('Are you sure you want to delete this slider?')"
                                    class="btn btn-danger flex-end">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <td>
                            <h5>No Data at the moment</h5>
                        </td>

                        @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection