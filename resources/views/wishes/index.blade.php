@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center py-3">
    <div class="header text-center fw-bold fs-2 w-50" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
</div>
  
    <div class="row justify-content-center py-3">
        <a class="btn btn-success my-3" style="color:#DDE1EC"href="{{ route('wishes.create') }}">
         {{ __('Create a wish!') }}
        </a>
     <table class="table table-hover rounded rounded-3 overflow-hidden" style="color: #ECEBF1">
        <thead style="background-color: #4a8e7a" class="align-middle">
          <tr>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach ($wishes as $wish)
          <tr style="color:#2E3641; background-color: #ECEBF1">
            <th scope="row">{{ $wish->description }}</th>
            <td>
                <span class="d-inline">
                    <a href="{{ route('wishes.edit', ['wish' => $wish]) }}" class="btn btn-primary">EDIT</a>
                </span>
                <span class="d-inline">
                    <form method="post" action="{{ route('wishes.destroy', ['wish' => $wish]) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ __('DELETE') }}" class="btn btn-danger">
                    </form>
                </span>
            </td>
          </tr>
      @endforeach
        </tbody>
      </table>
       
    </div>
</div>
@endsection
