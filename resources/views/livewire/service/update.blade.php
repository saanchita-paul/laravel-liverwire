<form>
    <input type="hidden" wire:model="service_id">
    <div class="form-group mb-3">
        <label for="serviceName">Name:</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="serviceName" placeholder="Enter Name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="serviceCategory">Category:</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="serviceCategory" wire:model="category_id">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group mb-3">
        <label for="serviceDescription">Description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="serviceDescription" wire:model="description" placeholder="Enter Description"></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Update</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>
