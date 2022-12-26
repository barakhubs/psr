@extends('layouts.app')

@section('title', 'Clients List')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Clients List</h3>
                        <h6 class="font-weight-normal mb-0">A list of all clients</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="min-height: 300px">
                    <div class="card-body">
                        <p class="card-title mb-3">Clients List</p>
                        {{-- <div class="table-responsive">
                            <table class="id="clientTable" class="table table-striped table-bordered" style="width:100%"">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>HIV Clinic No</th>
                                        <th>Fanily Name</th>
                                        <th>Given Name</th>
                                        <th>Gender</th>
                                        <th>Last Visit Date</th>
                                        <th>Next Appointment Date</th>
                                        <th>Phone Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($clients !== null)
                                        @foreach ($clients as $key => $item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->hiv_clinic_no }}</td>
                                            <td>{{ $item->family_name }}</td>
                                            <td>{{ $item->given_name }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->hiv_viral_load_date }}</td>
                                            <td>{{ $item->return_visit_date }}</td>
                                            <td>{{ $item->telephone_number }}</td>
                                            <td>{{ $item->return_visit_date }}</td>
                                            <td>
                                                <span><a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-outline-primary"><i class="ti-pencil"></i> Edit</a></span>
                                                <span><button data-toggle="modal" data-target="#modal{{ $item->id }}" class="btn btn-sm btn-outline-info"><i class="ti-eye"></i> View</button></span>
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
                            {{ $clients->links() }}
                        </div> --}}
                        <div class="table-responsive">
                            <table id="clientTable" class="table table-hover table-borderless" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>HIV Clinic No</th>
                                        <th>Family Name</th>
                                        <th>Given Name</th>
                                        <th>Gender</th>
                                        <th>Last Visit Date</th>
                                        <th>Next Appointment Date</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($clients !== null)
                                    @foreach ($clients as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->hiv_clinic_no }}</td>
                                        <td>{{ $item->family_name }}</td>
                                        <td>{{ $item->given_name }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->hiv_viral_load_date }}</td>
                                        <td>{{ $item->return_visit_date }}</td>
                                        <td>{{ $item->telephone_number }}</td>
                                        <td>
                                            <span><button data-toggle="modal" data-target="#modal{{ $item->id }}" class="btn pt-2 pb-2 btn-outline-primary"><i class="ti-eye"></i> View</button></span>
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
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>HIV Clinic No</th>
                                        <th>Fanily Name</th>
                                        <th>Given Name</th>
                                        <th>Gender</th>
                                        <th>Last Visit Date</th>
                                        <th>Next Appointment Date</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
