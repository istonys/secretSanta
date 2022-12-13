
@extends('layouts.app')

@section('content')

<style>
    body {
        height: 100%;
    }
    .container {
        display: grid;

        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 50px 200px 200px;

        gap: 50px;
        height: 100%;
    }
    .container div {
    }
    .header {
        background-color: white;
        grid-column-start: 1;
        grid-column-end: span 4;
        text-align: center;
        font-size: 200%;
        font-weight: bold;
    }
    .col-md-8{
        width: 100%;
        grid-column-start: 1;
        grid-column-end: 3;
        grid-row-start: 2;
        grid-row-end: 4;
    }
    .card {
        height: 90%;
        width: 90%
    }
    #asd {
        border: 1px solid black;
        grid-row-start: 2;
        grid-row-end: 4;
    }
    div .card-body form {
        height: 100%;
    }
</style>
<div class="container">
    <div class="header">Secret Santa</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <div id="asd"><ul>
        <li class="hohoho">
          <h2></h2><h2></h2><h2></h2>
        </li>
      <li class="santaclaus">
          <div class="chapeu">
            <div class="cone-2"></div>
          <div class="cone-1"></div>
        </div>
        <div class="face">
            <div class="eyes"></div>
          <div class="nariz"></div>
          <div class="barba">
              <div class="boca"></div>
          </div>
        </div>
        <div class="orelhas"></div>
      </li>
      <li class="hohoho">
          <h2></h2><h2></h2><h2></h2>
      </li>
    </ul></div>
</div>
@endsection
