@extends('layouts.app')

@section('title', 'Editing user')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-xl-0 ">
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold">User Management</h3>
                            <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="ti-list"></i> Users List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-3">Editing: {{ $user->first_name. ' '. $user->last_name }}</p>
                        <form class="forms-sample" method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" placeholder="First Name" name="first_name" value="{{ $user->first_name }}">
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="email" placeholder="Email" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" placeholder="Phone Number" name="phone_number" value="{{ $user->phone_number }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Select District</label>
                                    <select class="js-example-basic-single w-100 @error('district') is-invalid @enderror"
                                        name="district">
                                        @if ($districts !== null)
                                            @foreach ($districts as $item)
                                                <option
                                                    @if ($user->district == $item->id)
                                                    selected
                                                    @endif
                                                    value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option>No District found</option>
                                        @endif
                                    </select>
                                    @error('district')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
