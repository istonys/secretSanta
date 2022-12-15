@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>
    
    <div class="row py-3">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="color: #ECEBF1">Invite a new member</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('groups.index') }}"> To Groups</a>
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

    <form action="{{ route('invites.store') }}"  method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="color: #ECEBF1">Name of group:</strong>
                    <input type="text" name="invite_to" class="form-control mt-1" placeholder="Name of group">
                </div>
                <div class="form-group py-3">
                    <strong style="color: #ECEBF1">E-mail of invitee:</strong>
                    <input type="text" name="invitee" class="form-control mt-1" placeholder="E-mail of invitee">
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Invite</button>
            </div>
        </div>

    </form>
</div>
@endsection