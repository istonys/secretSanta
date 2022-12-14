<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;

class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin') {
            $pending_invites = Invite::all();
            $your_invites = Invite::where('invite_by','=',auth()->user()->id)->get();
        } else {
            $pending_invites = Invite::where('invitee', '=', auth()->user()->id)->get();
            $your_invites = Invite::where('invite_by','=',auth()->user()->id)->get();
        }

        return view('invites.index', ['pending_invites' => $pending_invites,'your_invites'=>$your_invites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Group $group)
    {
        $input = $request->all();
        $idus=User::where('email',$request->invitee)->first();
        $idgr=Group::where('name',$request->invite_to)->first();
        $inviter_name=User::where('id',auth()->user()->id)->first();
        $check=Group::where('user_id',auth()->user()->id)->first();
        if($check){
            if($idus){
                if($idgr){
                    $invite=new Invite;
                    $invite->invite_by = auth()->user()->id;
                    $invite->invite_to = $idgr->id;
                    $invite->invitee = $idus->id;
                    $invite->invite_by_info=$inviter_name->name;
                    $invite->invite_to_info=$request->invite_to;
                    $invite->invitee_info=$request->invitee;
                    $invite->save();
                }
                else{
                    return redirect()->route('groups.index')->with('error','Group does not exist');
                }
            }
            else{
                return redirect()->route('groups.index')->with('error','User does not exist');
            }
        }
        else{
            return redirect()->route('groups.index')->with('error','You are not the groups admin');
        }
        return redirect()->route('groups.index')->with('success','Invite created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function show(Invite $invite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function edit(Invite $invite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invite $invite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invite  $invite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invite $invite)
    {
        //
    }
}
