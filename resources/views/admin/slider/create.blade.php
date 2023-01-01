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
                    Create Category
                </h3>
                <a href="{{ route('sliders.index') }}" class="btn btn-primary btn-sm float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{route('sliders.store')}}" enctype="multipart/form-data" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Title</label>
                            <input type="text" name="title" id="name" class="form-control" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error(" image") is-invalid @enderror" name="image"
                                id="image" alt="image">
                            <img id="showImagePreview" src="#" alt="book image preview" height="150px" width="150px">
                            @error("image")
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                       
                        <div class="col-md-12 mb-3">
                            <label for="name">Description</label>
                            <textarea name="description" id="" cols="30" rows="10"
                                class="form-control description"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Status </label>
                            <input type="checkbox" name="status" class="mt-5 px-3" style="height: 20px; width:20px;">
                           
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-sm float-end">Save</button>

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

      
           window.onload = function () {
            
            // to display image preview
            let siteImage = document.getElementById('image');
            let showImagePreview = document.getElementById('showImagePreview');
            showImagePreview.style.display = "none";
            
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


            $(document).ready(function() {
            $('.description').summernote();
            });
</script>

@endsection