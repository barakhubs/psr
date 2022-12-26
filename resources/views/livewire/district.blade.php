<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Districts Lists</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Initials</th>
                                <th>Language</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($districts !== null)
                                @foreach ($districts as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->initials }}</td>
                                    <td>{{ $item->language }}</td>
                                    <td>
                                        <span><button wire:click="initiateUpdate({{ $item->id }})" class="btn btn-sm btn-outline-primary"><i class="ti-pencil"></i> Edit</button></span>
                                        <span><button wire:click="deleteDistrict({{ $item->id }})" class="btn btn-sm btn-outline-danger"><i class="ti-trash"></i> Delete</button></span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5">No district found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="pt-5">
                        {{ $districts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $formTitle }}</h4>
                <div class="pt-2">
                    <form class="forms-sample" wire:submit.prevent="{{ $submitFunction }}">
                        <div class="form-group">
                            <label for="name">District Name</label>
                            <input type="text" wire:model="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="District Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control @error('language') is-invalid @enderror"
                                id="language" placeholder="Language" wire:model="language">
                            @error('language')
                                <span class="invalid-feedback" role="alert">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="initials">Initials</label>
                            <input type="text" class="form-control @error('initials') is-invalid @enderror"
                                id="initials" placeholder="Initials" wire:model="initials">
                            @error('initials')
                                <span class="invalid-feedback" role="alert">{{ $message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
