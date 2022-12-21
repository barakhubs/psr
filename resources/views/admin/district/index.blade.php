@extends('layouts.app')

@section('title', 'Districts')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Manage Districts</h3>
                        <h6 class="font-weight-normal mb-0">All districts used in the system are managed from here </h6>
                    </div>
                </div>
            </div>
        </div>
        @livewire('district')
    </div>
@endsection
