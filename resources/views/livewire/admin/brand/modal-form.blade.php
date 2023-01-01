{{-- brand create --}}
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form >
            <div class="modal-body">
                <div class="col-mb-3">
                    <label for="">Category</label>
                    <select wire:model.defer="category_id" id="" required class="form-control">
                        <option >---Select Category------</option>
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>   
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger text-center">{{$message}}</small> @enderror
                
                </div>
                <div class="col-mb-3">
                    <label for="">Brand Name</label>
                    <input type="text" wire:model.defer="name" id="name" placeholder="Enter Brand Name" class="form-control">
                    @error('name') <small class="text-danger text-center">{{$message}}</small> @enderror

                </div>
                <div class="col-mb-3">
                    <label for="">Brand slug</label>
                    <input type="text" wire:model.defer="slug"  placeholder="Enter Brand Name" class="form-control">
                    @error('slug') <small class="text-danger text-center">{{$message}}</small> @enderror
                </div>
                <div class="col-mb-3">
                    <label for="">Status</label> <br>

                    <input type="checkbox" wire:model.defer="status" id="ischecked"> checked=hidden,un-checked=visible
                    @error('status') <small class="text-danger text-center">{{$message}}</small> @enderror

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="storeBrand()" class="btn btn-primary" data-bs-dismiss="modal">Save </button>
            </div>
            </form>
        </div>
    </div>
</div>
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
            $( "body" ).on( "change","#ischecked" , function() {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
        });
    </script>

@endsection
{{-- brand update --}}

<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span> 
                </div>
                Loading...
            </div>
            <div wire:loading.remove>
                <form>
                    <div class="modal-body">
                        <div class="col-mb-3">
                            <label for="">Category</label>
                            <select wire:model.defer="category_id" id="" required class="form-control">
                                <option>---Select Category------</option>
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger text-center">{{$message}}</small> @enderror
                        </div>
                        <div class="col-mb-3">
                            <label for="">Brand Name</label>
                            <input type="text" wire:model.defer="name" id="name" placeholder="Enter Brand Name" class="form-control">
                            @error('name') <small class="text-danger text-center">{{$message}}</small> @enderror
                
                        </div>
                        <div class="col-mb-3">
                            <label for="">Brand slug</label>
                            <input type="text" wire:model.defer="slug" placeholder="Enter Brand Name" class="form-control">
                            @error('slug') <small class="text-danger text-center">{{$message}}</small> @enderror
                        </div>
                        <div class="col-mb-3">
                            <label for="">Status</label> <br>
                
                            <input type="checkbox" wire:model.defer="status" id="ischecked">
                            checked=hidden,un-checked=visible
                            @error('status') <small class="text-danger text-center">{{$message}}</small> @enderror
                
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="updateBrand()" class="btn btn-primary" data-bs-dismiss="modal">Update
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

