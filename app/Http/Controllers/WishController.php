<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Models\Group;
use App\Models\User;
use App\Models\Gifts;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;

class WishController extends Controller
{
    public function index() {
        if(auth()->user()->role == 'admin') {
            $wishes = Wish::all();
        } else {
            $wishes = Wish::where('user_id', '=', auth()->user()->id)->get();
        }

        return view('wishes.index', ['wishes' => $wishes]);
    }

    public function create() {
       return view('wishes.create');
    }

    public function store(Request $request) {
        $input = $request->all();

        Wish::create(
            [
                'description' => $request['description'],
                'user_id' => auth()->user()->id
            ]
        );

        return redirect()->route('wishes.index');
    }

    public function edit(Wish $wish) {
        return view('wishes.edit', ['wish' => $wish]);
     }

     public function update(Request $request, Wish $wish) {
        $input = $request->all();

        $wish->update(['description' => $input['description']]);

        return redirect()->route('wishes.index');
    }

    public function destroy(Wish $wish) {
        $wish->delete();

        return redirect()->route('wishes.index');
    }
    public function wish_pull(Group $group){
        $g=$group;
        $giftee=\DB::table('group_user')->where('user_id',auth()->user()->id)->
        where('group_id',$group->id)->first();
        $gifts=\DB::table('wishes')->where('user_id',$giftee->gifts_to)->
        where('reserved','0')->get();
        return view('wishes.reserve',['gifts'=>$gifts]);
    }

    public function reserve(Wish $gift){
        \DB::table('wishes')->where('description',$gift->description)
        ->where('user_id',$gift->user_id)->update(['reserved'=>'1']);
        Gifts::create(
            [
                'description'=>$gift->description,
                'user_id'=>$gift->user_id,
                'reserved_by'=>auth()->user()->id,
                'gifting_to'=>\DB::table('users')->where('id',$gift->user_id)->first()->name
            ]
        );
        return redirect()->route('gifts.index')->with('success','Wish reserved');
    }
}
