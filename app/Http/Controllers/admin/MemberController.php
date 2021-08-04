<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.users.userLists');
        } else {
            return view('app.login');
        }
    }

    public function getMembers()
    {
        $cat = User::whereHas(
            'roles', function ($q) {
            $q->where('name', 'member')
            ->orWhere('name','senior');
        }
        )->get();
        return response()->json(['members' => $cat], 200);
    }

    public function confirmMember($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->confirmed = true;
            $user->save();
            return response()->json(['message' => "ok"], 200);
        } else {
            return response()->json(['message' => "not"], 200);
        }
    }

    public function memberDetail($id)
    {
        $user = User::find($id);
        return view('admin.users.userDetail', ['member' => $user]);
    }

    public function deleteMember($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => "ok"], 200);
        } else {
            return response()->json(['message' => "not"], 200);
        }
    }

    public function saveMember(Request $request)
    {


        $role = Role::firstOrCreate(
            ['name' => request('role')],
            ['display_name' => request('role')],
            ['description' => request('role')]
        );


//            $toten = Str::random(4);
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->role_id = $role->id;
        $user->confirmed = true;
        $user->activated = true;
        $user->email = $request['email'];
        $user->telephone = $request['phone'];
        $user->username = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();

        $user->attachRole($role);

//        return view('survey-panel-member.account-login');
        return response()->json(['user' => $user, 'message' => 'ok'], 200);


    }
}
