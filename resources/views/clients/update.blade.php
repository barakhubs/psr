@extends('layouts.app')

@section('title', 'Update Databse')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Clients Database</h3>
                        <h6 class="font-weight-normal mb-0">Here you can update the patients Database by uploading new excel lists</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="min-height: 300px">
                    <div class="card-body">
                        <p class="card-title mb-3">Upload excel file to update database</p>
                        @livewire('client')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
