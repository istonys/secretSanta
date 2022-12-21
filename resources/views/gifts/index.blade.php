@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50 p-3" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>
  
    <div class="row justify-content-center py-3">
        
     <table class="table table-hover rounded rounded-3 overflow-hidden" style="color: #ECEBF1">
        <thead style="background-color: #4a8e7a" class="align-middle">
          <tr>
            <th scope="col">Gift</th>
            <th scope="col">Gifting to</th>
            <th scope="col">From group</th>
          </tr>
        </thead>
        <tbody class="align-middle">
          @foreach ($gifts as $gift)
          <tr style="color:#2E3641; background-color: #ECEBF1">
            <th scope="row">{{ $gift->description }}</th>
            <th scope="row">{{ $gift->gifting_to }}</th>
            <th scope="row">{{ $gift->gifting_from }}</th>
            <td>
            </td>
          </tr>
      @endforeach
        </tbody>
      </table>
       
    </div>
</div>
@endsection
