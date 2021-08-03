<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function firstRegister(){
        $user=User::all();
        $count=$user->count();

        if ($count>0) {
            return view('app.login');
        }else {
            return view('auth.admin_register');
        }
    }
    public function saveFirstRegister(Request $request){
        $role = new Role();
        $role->name = "admin";
        $role->display_name = "Administrator";    // optional
        $role->description  = "Survey all activities of company";  // optional
        $role->save();

        $user=new User();
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->role_id=$role->id;
        $user->email=$request['email'];
        $user->telephone=$request['phone'];
        //$user->gender=$request['gender'];
        //$user->address=$request['address'];
        $user->country=$request['country'];
        //$user->state=$request['state'];
        $user->confirmed=true;
        $user->activated=true;
        $user->date=$request['dob'];
        //$user->city=$request['city'];
        //$user->username=$request['username'];
        $user->password=bcrypt($request['password']);
        $user->save();

        $user->attachRole($role);

//        return view('survey-panel-member.account-login');
        return response()->json(['user' => $user,'message'=>'ok'], 200);
    }
    public function memberStore(Request $request){
        $role=Role::where('name','=','member')->first();

        if(!$role){
            $role = new Role();
            $role->name = "member";
            $role->display_name = "Member";    // optional
            $role->description  = "Support us in different Survey";  // optional
            $role->save();
        }else {

            $toten=Str::random(4);
        $user=new User();
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->role_id=$role->id;
        $user->email=$request['email'];
        $user->telephone=$request['phone'];
        //$user->gender=$request['gender'];
        //$user->address=$request['address'];
        $user->country=$request['country'];
       // $user->state=$request['state'];
        $user->email_verification_token=$toten;
        $user->date=$request['dob'];
        //$user->city=$request['city'];
        //$user->username=$request['username'];
        $user->password=bcrypt($request['password']);
        $user->save();

        $user->attachRole($role);

//        return view('survey-panel-member.account-login');
        return response()->json(['user' => $user,'message'=>'ok'], 200);
    }}
}
