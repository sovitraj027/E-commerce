<div class="modal fade" wire:ignore.self id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
                <div class="modal-body">
                    <h5>Are you sure you want to Delete this Brand?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" wire:c class="btn btn-primary" data-bs-dismiss="modal">yes. Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>