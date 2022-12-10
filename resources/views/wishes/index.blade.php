@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        wishes blieytttt 
        <a class="btn btn-primary" href="{{ route('wishes.create') }}">
         {{ __('create jabana wish\'a ble ') }}
     </a>
        @foreach ($wishes as $wish )
            <div>
                <span>{{ $wish->description }}</span>
                <span>
                    <a href="{{ route('wishes.edit', ['wish' => $wish]) }}">EDIT</a>
                </span>
                <span>
                    <form method="post" action="{{ route('wishes.destroy', ['wish' => $wish]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="{{ __('DELETE') }}">
                    </form>
                </span>
            </div>
        @endforeach
    </div>
</div>
@endsection
