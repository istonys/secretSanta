@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Groups</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('groups.create') }}"> Create a new group</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
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
            <form action="{{ route('groups.destroy',$group->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('groups.members',$group->id) }}">Show members</a>
                <a class="btn btn-primary" >Leave</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $groups->links() }}



@endsection