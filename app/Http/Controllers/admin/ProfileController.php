<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function changePassword()
    {
        if (Auth::check()){
            return view('admin.profiles.changePassword');
        }else{
            return view('app.login');
        }
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8'],
            [
                'old_password.required' => ' The Old password field is required.',
                'password.required' => ' The password field is required.',
                'confirm_password.required' => ' The Confirm password field is required.',
                'password.min' => ' The password must be at least 8 characters.',
                'confirm_password.min' => ' The password must be at least 8 characters.',
            ]);
        if (Auth::check())
        {
            $user=User::find(Auth::User()->id);

            if (Hash::check($request['old_password'], Auth::User()->password)){
                $user->password=bcrypt($request['password']);
                $user->save();
                return response()->json(['password' => 'ok'], 200);

            }
            else {
                return response()->json(['password' => 'not'], 200);
            }

        }else{
            return view('app.login');
        }
    }
    public function getProfile()
    {
        if (Auth::check()){
            return view('admin.profiles.changeProfile');
        }else{
            return view('app.login');
        }
    }
    public function viewProfile()
    {
        if (Auth::check()){
            return view('admin.profiles.viewProfile');
        }else{
            return view('app.login');
        }
    }
    public function getInfo()
    {
        if (Auth::check()){
            return view('admin.profiles.editInfo');
        }else{
            return view('app.login');
        }
    }
    public function updateInfo(Request $request){
        if (Auth::check()){
           $user=User::find(Auth::user()->id);
           if ($user) {
               $user->first_name = $request['first_name'];
               $user->last_name = $request['last_name'];
               $user->email = $request['email'];
               $user->telephone = $request['telephone'];
               $user->address = $request['address'];
               $user->country = $request['country'];
               $user->state = $request['state'];
               $user->date = $request['date'];
               $user->city = $request['city'];
               $user->username = $request['username'];
               $user->save();
               return response()->json(['info' => 'ok'], 200);
           }
        }else{
            return view('app.login');
        }
    }
    public function updateProfile(Request $request){
        if (Auth::check()){
            $user=User::find(Auth::user()->id);
            if ($user) {
                if ($user->photo) {
                    if (file_exists(public_path('uploads/profiles/' . $user->photo))) {
                        unlink(public_path('uploads/profiles/' . $user->photo));
                    }
                }

                $file=$request->file('profile');
                $filename =time().$file->getClientOriginalName();
                $file->move(public_path('uploads\profiles'),$filename);


                $user->photo = $filename;
                $user->save();
                return response()->json(['profile' => 'ok'], 200);
            }
        }else{
            return view('app.login');
        }
    }
}
