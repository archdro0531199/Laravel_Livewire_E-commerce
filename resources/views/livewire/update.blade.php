<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" wire:model="name">
                @error('name') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
			<div class="form-group mb-3">
                <label for="unit_price">Unit_Price:</label>
                <input type="text" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" placeholder="Enter Unit_Price" wire:model="unit_price">
                @error('unit_price') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description') 
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="updatePost()" class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent="cancelPost()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>