@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Groups</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('groups.create') }}"> Create a new group</a>
            <a class="btn btn-info" href="{{ route('invites.create') }}">Invite members to your group</a>
        </div>
    </div>
</div>

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

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($groups as $group)
    <tr>
        <td>{{ $group->name }}</td>
        <td>{{ $group->description }}</td>
        <td>
            <form action="{{ route('groups.destroy',['group'=>$group->id]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('groups.members',$group->id) }}">Show members</a>
                
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Leave</button>
                
            </form>
            {{-- <form action="{{ route('groups.leave',['group'=>$group->id,'id'=>$group->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <!--<a class="btn btn-primary" href="{{ route('groups.leave',$group->id) }}"method="POST">Leave</a>-->
                <button type="submit">Leave</button>
            </form> --}}
        </td>
    </tr>
    @endforeach

</table>
{{ $groups->links() }}



@endsection