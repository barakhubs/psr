@extends('layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-xl-0 ">
                        <div class="d-flex justify-content-between">
                            <h3 class="font-weight-bold">User Management</h3>
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="ti-plus"></i> New User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Users List</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>District</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users !== null)
                                        @foreach ($users as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->district }}</td>
                                            <td>
                                                <span><a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="ti-pencil"></i> Edit</a></span>
                                                <span><button data-toggle="modal" data-target="#modal{{ $item->id }}" class="btn btn-sm btn-outline-danger"><i class="ti-trash"></i> Delete</button></span>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                Are you sure you want to delete this user?
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <form method="POST" action="{{ route('users.destroy') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7">No user found! <a href="{{ route('users.create') }}">Create One</a></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
