@extends('layouts.app')

@section('content')
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
                    <!--<a href="{{ route('invites.edit', ['invite' => $pending_invite]) }}">Accept</a>-->
                    <a action="{{ route('invites.edit', ['invite' => $pending_invite]) }}">
                    <input type="submit" value="{{ __('Accept') }}">
                </span>
                <span>
                    <a method="post" action="{{ route('invites.destroy', ['invite' => $pending_invite]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ __('Deny') }}">
                    </a>
                </span>
            </div>
        @endforeach
    </div>
</div>
<div class="container">

</div>
@endsection