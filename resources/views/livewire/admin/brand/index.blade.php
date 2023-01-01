<div>
    @include('livewire.admin.brand.delete-form')
@include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   
                    <h3>
                        Brand List
                    </h3>
                    <a  class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>
                                    @if($brand->category)
                                    {{$brand->category->name}}
                                    @else
                                    No Category
                                    @endif
                                </td>
                                <td>{{$brand->status == '1' ? 'Visible':'Hidden'}}</td>
                                <td>
                                    <a href="" wire:click="editBrand({{$brand->id}})" class="btn btn-primary flex-end" data-bs-toggle="modal" data-bs-target="#updateBrandModal" >Edit</a>
                                    <a href="#" wire:click="deleteBrand({{$brand->id}})"  data-bs-toggle="modal" data-bs-target="#deleteBrandModal" class="btn btn-danger flex-end">Delete</a>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                        @empty
                            <td>No Brand at the moment</td>
                        @endforelse
                    </table>
                    <div>
                        {{$brands->links()}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
