<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-3">Profile Details</p>
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <tbody class="border-1">
                            <tr>
                                <td>First Name</td>
                                <td class="font-weight-bold">{{ $profile->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td class="font-weight-bold">{{ $profile->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="font-weight-bold">{{ $profile->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td class="font-weight-bold">{{ $profile->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td class="font-weight-bold">{{ $profile->role }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password</h4>
                <div class="pt-2">
                    <form class="forms-sample" wire:submit.prevent="changePassword">
                        @csrf
                        <div class="form-group">
                            <label for="old_password" class="">Old Password</label>
                            <div class="">
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                    id="old_password" placeholder="Old Password" wire:model="old_password">
                            </div>
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <div>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                    id="new_password" placeholder="New Password" wire:model="new_password">
                            </div>
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" placeholder="Confirm Password" wire:model="password_confirmation">
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
