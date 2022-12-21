@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row py-3">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 style="color: #ECEBF1">Groups</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('groups.create') }}"> Create a new group</a>
                <a class="btn btn-info" href="{{ route('invites.create') }}" style="color: #ECEBF1">Invite members to your group</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-failure" style="background-color: #4a8e7a">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover rounded rounded-3 overflow-hidden" style="color: #ECEBF1">
        <thead style="background-color: #4a8e7a" class="align-middle">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col" width="280px">Action</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($groups as $group)
            <tr style="color:#2E3641; background-color: #ECEBF1">
                <th>{{ $group->name }}</td>
                <th>{{ $group->description }}</td>
                <td>                        
                    <span class="d-inline">
                        <a class="btn" href="{{ route('groups.members',$group->id) }}" style="color: #ECEBF1; background-color:#2E3641">Show members</a>
                    </span>
                    <a class="btn btn-success" href="{{ route('groups.pull',$group->id) }}">Reserve your gifts</a>
                    <span class="d-inline">
                        <form action="{{ route('groups.destroy',['group'=>$group->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')       
                            <button type="submit" class="btn btn-danger">Leave</button> 
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach      
        </tbody>
    </table>
</div>
@endsection