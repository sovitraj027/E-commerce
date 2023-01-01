@extends('layouts.admin.admin')
@section('inlinecss')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Update Slidre
                </h3>
                <a href="{{ route('sliders.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data"
                    method="Post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="name" class="form-control" value="{{ $slider->title }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error(' image') is-invalid @enderror" name="image"
                                id="image" alt="image">
                            @if (isset($slider->image))
                            <img id="showImagePreview" src="/storage/slider-image/{{ $slider->image }}"
                                alt="slider image preview" height="150px" width="150px">
                            @endif
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="name">Description</label>
                            <textarea name="description" id="" cols="30" rows="20"
                                class="form-control description">{!! $slider->description !!}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Status </label>
                            <input type="checkbox" name="status" style="height: 20px; width:20px;" {{ $slider->status == '1' ? 'checked' : '' }}  >
                            
                        </div>
                        
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
        
       window.onload = function () {
        
        // to display image preview
        let siteImage = document.getElementById('image');
        let showImagePreview = document.getElementById('showImagePreview');
        // showImagePreview.style.display = "none";
        
        siteImage.onchange = evt => {
        const [file] = siteImage.files
        if (file) {
        showImagePreview.style.display = "block";
        showImagePreview.src = URL.createObjectURL(file);
        showImagePreview.onload = function () {
        URL.revokeObjectURL(showImagePreview.src) // free memory
        }
        }
        }
        };
</script>

@endsection