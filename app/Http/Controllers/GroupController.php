<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invite;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=Group::latest()->paginate(10);

        return view('groups.index',compact('groups'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $check=Group::where('name',$request->name)->first();
        if(!$check){
            $group=new Group;
            $group->name = $request['name'];
            $group->description = $request['description'];
            $group->user_id = auth()->user()->id;
            $group->save();
        }
        else{
            return redirect()->route('groups.index')->with('error','Group with this name already exists');
        }
        $groupusers=array([
            'group_id'=>Group::orderBy('id', 'DESC')->first()->id,
            'user_id'=>auth()->user()->id
            ]);
        $group->users()->attach($groupusers);
        return redirect()->route('groups.index')->with('success','Group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $gid=$group->id;
        $id=auth()->user()->id;
        \DB::delete('DELETE from group_user WHERE group_id =? AND  user_id =?',[$gid,$id]);
        // \DB::delete('DELETE from group_user WHERE group_id =?',[$group->id]);
        // $group->delete();
        return redirect()->route('groups.index')->with('success','Group left successfully');
    }

    public function members(Group $group)
    {
        //$groups=(['name']);
        $gid=$group->id;
        $users=\DB::table('groups')->join('group_user','groups.id','=','group_user.group_id')
        ->join('users','group_user.user_id','=','users.id')->where('groups.id','=',$gid)
        ->get(['users.name']);
        return view('groups.members',compact('users'))->with(request()->input('page'));
    }
    public function invite(Group $group){
        $ids=\DB::select('SELECT * from groups WHERE group_id =?',[$group->id]);
        $id=$ids->group_id;

    }
    public function leave(Group $group, Group $id){
        $id=auth()->user()->id;
        \DB::delete('DELETE * from group_user WHERE group_id =? AND  user_id =?',[$gid,$id]);
        return redirect()->route('groups.index')->with('success','Group left successfully');
    }
    public function invitation(Invite $invite,Group $group){

    }
    // public function invitation_view(Group $group){
    //     return view('groups.invitation')->with($group);
    // }
}
