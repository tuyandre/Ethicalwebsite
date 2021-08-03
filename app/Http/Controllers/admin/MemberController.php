<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return view('admin.users.userLists');
        }else{
            return view('app.login');
        }
    }
    public function getMembers(){
        $cat=User::whereHas(
            'roles', function($q){
            $q->where('name', 'member');
        }
        )->get();
        return response()->json(['members' => $cat], 200);
    }
    public function confirmMember($id){
        $user=User::find($id);
        if ($user){
            $user->confirmed=true;
            $user->save();
            return response()->json(['message' => "ok"], 200);
        }
        else{
            return response()->json(['message' => "not"], 200);
        }
    }
    public function memberDetail($id){
        $user=User::find($id);
        return view('admin.users.userDetail',['member'=>$user]);
    }
    public function deleteMember($id){
        $user=User::find($id);
        if ($user){
            $user->delete();
            return response()->json(['message' => "ok"], 200);
        }
        else{
            return response()->json(['message' => "not"], 200);
        }
    }

}
