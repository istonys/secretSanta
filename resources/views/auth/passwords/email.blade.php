@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-3 header text-center fw-bold fs-2" style="color: #DDE1EC">Secret Santa</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #2E3641; color:#DDE1EC">
                <div class="card-header border-white" style="background-color:#4D5258; color:#DDE1EC">{{ __('Reset Password') }}</div>

                <div class="card-body border-white" style="color:#DDE1EC">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color:#DDE1EC; color:#2E3641;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
