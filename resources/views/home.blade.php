@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- login acknowledgement -->
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">My Packages <a href="#" class="btn btn-sm btn-primary">Request New Package</a> &nbsp; <a href="#">Select existing Package</a></div>
                <div class="card-body">
                    No Packages yet 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
