@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row py-3">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="color: #ECEBF1">Add a new group</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('groups.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Incorrect data was entered.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('groups.store') }}"  method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: #ECEBF1">Name:</strong>
                    <input type="text" name="name" class="form-control mt-1" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group py-3">
                    <strong style="color: #ECEBF1">Description:</strong>
                    <textarea class="form-control mt-1" style="height:150px" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

    </form>
</div>
@endsection