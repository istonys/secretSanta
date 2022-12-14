@extends('layouts.app')

@section('content')
<div class="container">
  <div class="py-3 header text-center fw-bold fs-2" style="color: #DDE1EC">Secret Santa</div>
    <div class="row justify-content-center">
        <a class="btn btn-primary my-3" style="color:#2E3641; background-color: #DDE1EC" href="{{ route('wishes.create') }}">
         {{ __('Create a wish!') }}
     </a>
     <table class="table table-hover" style="color: #DDE1EC">
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
