@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Wish') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('wishes.store') }}">
                        @csrf
                        <input type="text" name="description">
                        <input type="submit" value="{{ __('create') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
