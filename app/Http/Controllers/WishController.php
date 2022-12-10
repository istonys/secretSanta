<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index() {
        // if(auth()->user()->role === '')
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
}
