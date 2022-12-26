<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Facilities in district</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($facilities->count() > 0 )
                                @foreach ($facilities as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <span><button wire:click="deleteFacility({{ $item->id }})" class="btn btn-sm btn-outline-danger"><i class="ti-trash"></i> Delete</button></span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="3">No Facility found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="pt-5">
                        {{ $facilities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Facility</h4>
                <div class="pt-2">
                    <form class="forms-sample" wire:submit.prevent="submitFacility">
                        <div class="form-group">
                            <label for="name">Facility Name</label>
                            <input type="text" wire:model="name"
                                class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Facility Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">{{ $message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
