@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-3">
        <div class="header text-center fw-bold fs-2 w-50" style="color: #ECEBF1; border-bottom: 1px solid #ECEBF1">Secret Santa</div>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <div class="card border-white" style="background-color: #ECEBF1">
                <div class="card-header border-white" style="background-color:#4a8e7a; color:#ECEBF1">{{ __('Introduction') }}</div>

                <div class="card-body border-white" style="color:#2E3641">
                    <div class="row">
                        <h2>What is Secret Santa?</h1>

                        <p>Secret Santa is a tradition in which members of a group
                            or community are randomly assigned a person to whom they
                            give a gift. The identitiy of the gift giver is to remain
                            a secret and should not be revealed.
                        </p>
                    </div>
                    <div class="row">
                        <h2>What's the idea behind Secret Santa online?</h1>
                        <p>Sometimes we can't meet in person with our group of friends
                            or family to draw the names from a hat or bowl before Christmas
                            or Secret Santa event. Our project is trying to save your 
                            Christmas and make it happen without any trouble!
                        </p>
                    </div>
                    <div class="row">
                        <h2>What are the rules of Secret Santa?</h1>
                        <p>Members of a group of friends, family, or coworkers
                            draw random names to become someone's Secret Santa. The Secret
                            Santa is given a wish list of gift ideas to choose from to give
                            to their chosen giftee. After you did that online, you can continue
                            playing Secret Santa in real life in order for the giftee to guess
                            which member of the group was their Secret Santa!
                        </p>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <h2 class="text-center">Lets get started!</h2>
                        <a class="btn btn btn-danger w-auto" href="{{ route('wishes.index') }}">Your Wishes!</a>
                        <a class="btn btn btn-success w-auto ms-3" href="{{ route('groups.index') }}">Groups!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
