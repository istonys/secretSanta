@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Invite a new member</h2>
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
                <strong>Name of group:</strong>
                <input type="text" name="invite_to" class="form-control" placeholder="Name of group">
            </div>
            <div class="form-group">
                <strong>E-mail of invitee:</strong>
                <input type="text" name="invitee" class="form-control" placeholder="E-mail of invitee">
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Invite</button>
        </div>
    </div>

</form>

@endsection