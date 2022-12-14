@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #5EB69D">
                <div class="card-header border-white" style="background-color: #4A8E7A; color:#ECEBF1">{{ __('Create Wish') }}</div>

                <div class="card-body border-white" style="color:#ECEBF1">
                    <form method="post" action="{{ route('wishes.store') }}">
                        @csrf
                        <input type="text" name="description">
                        <input type="submit" value="{{ __('create') }}" style="background-color: #4A8E7A; color:#ECEBF1; border-color: #4A8E7A">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
