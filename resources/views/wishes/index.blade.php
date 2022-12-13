@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        wishes blieytttt 
        <a class="btn btn-primary" href="{{ route('wishes.create') }}">
         {{ __('create jabana wish\'a ble ') }}
     </a>
     <table class="table">
        <thead>
          <tr>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($wishes as $wish )
          <tr>
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
