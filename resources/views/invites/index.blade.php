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
    <div class="row justify-content-left">
        Pending invites: 
        @foreach ($pending_invites as $pending_invite )
            <div>
                You are invited to join: 
                <span>{{ $pending_invite->invite_to_info }}</span>
                
                by: 
                <span>{{ $pending_invite->invite_by_info }}</span>
                <span>
                    
                    <a href="{{ route('invites.edit', $pending_invite->id) }}">Accept</a>
                    <!--<a action="{{ route('invites.edit', $pending_invite->id) }}">-->
                    <!--<input type="submit" value="{{ __('Accept') }}">-->
                </span>
                <span>
                    <form action="{{ route('invites.destroy',['invite'=>$pending_invite->id]) }}" method="POST">                   
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ __('Deny') }}">
                    </form>
                    </a>
                </span>
            </div>
        @endforeach
    </div>
</div>
<div class="container">

</div>
@endsection