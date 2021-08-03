<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberAccountLoginController extends Controller
{
    public function index()
    {
        
        return view('app.login');
    }
}
