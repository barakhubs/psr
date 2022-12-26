@extends('layouts.app')

@section('title', 'Send Custom SMS')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Custom SMS</h3>
                        <h6 class="font-weight-normal mb-0">Send a custom sms to a specific user or users</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card" style="min-height: 300px">
                    <div class="card-body">
                        <p class="card-title mb-3">Sending custom sms</p>
                        @livewire('custom-sms')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
