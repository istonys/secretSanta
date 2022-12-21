@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row py-3">
              <a class="btn btn-primary mt-2" style="width: auto" href="{{ route('groups.index') }}">Go Back</a>
              @if(count($gifts)>0)
              <h2 class="text-center mt-2 fs-4" style="color: #ECEBF1">You are gifting to: {{ $gifts[0]->user_name }}</h2>
              @else
              <h2 class="text-center mt-2 fs-4" style="color: #ECEBF1">User you pulled has no wishes</h2>
              @endif
    </div>


    <div class="row justify-content-center py-3">

     <table class="table table-hover rounded rounded-3 overflow-hidden" style="color: #ECEBF1">
        <thead style="background-color: #4a8e7a" class="align-middle">
          <tr>
            <th scope="col">Gift</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach ($gifts as $gift)
          <tr style="color:#2E3641; background-color: #ECEBF1">
            <th scope="row">{{ $gift->description }}</th>
            <td>
                <span class="d-inline">
                    <a class="btn btn-primary" href="{{ route('wishes.reserve', ['gift' => $gift->id]) }}" >Reserve</a>
                </span>
            </td>
          </tr>
      @endforeach
        </tbody>
      </table>
       
    </div>
</div>
@endsection
