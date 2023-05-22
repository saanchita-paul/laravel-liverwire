<div>
    <div class="col-md-12 mb-2">
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if($updateService)
                    @include('livewire.service.update')
                @else
                    @include('livewire.service.create')
                @endif

            </div>
        </div>
    </div>
    <!-- Filter by Category -->
    <div class="form-group mb-3">
        <label for="categoryFilter"><b>Filter by Category:</b></label>
        <select class="form-control" id="categoryFilter" wire:model="categoryFilter">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($services) > 0)
                            @foreach ($services as $service)
                                @if ($categoryFilter === '' || $categoryFilter == $service->category_id)
                                    <tr>
                                        <td>
                                            {{ $service->name }}
                                        </td>
                                        <td>
                                            {{ $categories->firstWhere('id', $service->category_id)->name }}
                                        </td>
                                        <td>
                                            {{ $service->description }}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{ $service->id }})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteService({{ $service->id }})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" align="center">
                                    No Services Found.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteService(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteService',id);
        }
    </script>
</div>
