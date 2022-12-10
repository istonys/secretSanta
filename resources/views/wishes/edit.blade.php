@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Wish') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('wishes.update', ['wish' => $wish]) }}">
                        @csrf
                        @method('PUT')
                        <input type="text" name="description" value="{{ $wish->description }}">
                        <input type="submit" value="{{ __('update') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
