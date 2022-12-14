@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #5EB69D">
                <div class="card-header border-white" style="background-color: #4A8E7A; color:#ECEBF1">{{ __('Register') }}</div>

                <div class="card-body border-white" style="color:#ECEBF1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn" style="background-color: #4A8E7A; color:#ECEBF1">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <figure class="py-4 text-center" style="color:#DDE1EC">
        <blockquote class="blockquote">
            <p>“Christmas is not as much about opening our presents as opening our hearts.”</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            <cite title="Source Title" style="color: #DDE1EC">Janice Maeditere</cite>
        </figcaption>
    </figure>
</div>
@endsection
