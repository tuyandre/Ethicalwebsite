<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CallRequest;
use App\Models\Contactu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function saveContactus(Request $request){
        $contact=new Contactu();
        $contact->name=$request['name'];
        $contact->email=$request['email'];
        $contact->subcategory_id=$request['category'];
        $contact->message=$request['message'];
        $contact->phone=$request['phone'];
        $contact->date=Carbon::now();
        $contact->save();
        return response()->json(['message' => 'ok'], 200);
    }
    public function saveCallRequest(Request $request){
        $req=new CallRequest();
        $req->name=$request['name'];
        $req->email=$request['email'];
        $req->subcategory_id=$request['category'];
        $req->message=$request['message'];
        $req->phone=$request['phone'];
        $req->dob=$request['date'];
        $req->date=Carbon::now();
        $req->save();
        return response()->json(['message' => 'ok'], 200);
    }
}
