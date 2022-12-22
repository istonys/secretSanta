@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-failure">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container">

    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>
    
    <div class="row justify-content-left py-3">
        <div class="col-lg-12">
            <div class="pull-left">
                <h4 style="color: #ECEBF1">Pending invites:</h2>
            </div>
        </div>

        <table class="table table-hover rounded rounded-3 overflow-hidden mt-2" style="color: #ECEBF1">
            <thead style="background-color: #4a8e7a" class="align-middle">
                <tr>
                    <th scope="col">You are invited to join:</th>
                    <th scope="col">By:</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending_invites as $pending_invite)
                <tr style="color:#2E3641; background-color: #ECEBF1" class="align-middle">
                    <th>{{ $pending_invite->invite_to_info }}</td>
                    <th>{{ $pending_invite->invite_by_info }}</td>
                    <td>                    
                        <span>
                            <a class="btn btn-success" href="{{ route('invites.edit', $pending_invite->id) }}">Accept</a>
                        </span>
                        <span>
                            <form action="{{ route('invites.destroy',['invite'=>$pending_invite->id]) }}" method="POST" class="d-inline">                   
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="{{ __('Deny') }}" class="btn btn-danger">
                            </form>
                        </span>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection