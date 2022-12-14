@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #ECEBF1">
                <div class="card-header border-white" style="background-color:#4a8e7a; color:#ECEBF1">{{ __('Dashboard') }}</div>

                <div class="card-body border-white" style="color: #5f1326">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
