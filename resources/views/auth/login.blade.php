
@extends('layouts.app')

@section('content')

<style>
    .container {
        font-family: 'Oswald';
    }

</style>

<div class="container">
    <div class="py-3 header text-center fw-bold fs-2" style="color: #DDE1EC">Secret Santa</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #2E3641; color:#DDE1EC">
                <div class="card-header border-white" style="background-color:#4D5258; color:#DDE1EC">{{ __('Login') }}</div>
                <div class="card-body border-white" style="color:#DDE1EC">
                    <form method="POST" action="{{ route('login') }}">
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

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn text-black" style="background-color:#DDE1EC">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#DDE1EC">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <figure class="py-4 text-center" style="color:#DDE1EC">
            <blockquote class="blockquote">
            <p>"Adults can take a simple holiday for children and f*ck it up."</p>
            </blockquote>
            <figcaption class="blockquote-footer">
            <cite title="Source Title" style="color: #DDE1EC">Angry child</cite>
            </figcaption>
        </figure>
</div>
@endsection
