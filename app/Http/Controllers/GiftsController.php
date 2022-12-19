<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Gifts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;

class GiftsController extends Controller
{
    public function index() {
        // if(auth()->user()->role === '')
        if(auth()->user()->role == 'admin') {
            $wishes = Gifts::all();
        } else {
            $wishes = Gifts::where('reserved_by', '=', auth()->user()->id)->get();
        }

        return view('gifts.index', ['gifts' => $wishes]);
    }
}
