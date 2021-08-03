<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function index()
    {
        
        return view('survey-panel-member.password-reset');
    }
}
