@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row py-3">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2 class="" style="color: #ECEBF1">Members</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mt-2" href="{{ route('groups.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <table class="table table-hover rounded rounded-3 overflow-hidden mt-3" style="color: #ECEBF1">
        <thead style="background-color: #4a8e7a" class="align-middle">
            <tr>
                <th scope="col">Vardas</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach ($users as $user)
            <tr style="color:#2E3641; background-color: #ECEBF1">
                <th>{{ $user->name }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection