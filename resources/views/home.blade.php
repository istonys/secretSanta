@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-3 header text-center fw-bold fs-2" style="color: #DDE1EC">Secret Santa</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #DDE1EC; color:#DDE1EC">
                <div class="card-header border-white" style="background-color:#4D5258; color:#DDE1EC">{{ __('Dashboard') }}</div>

                <div class="card-body border-white" style="color:#2E3641">
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
