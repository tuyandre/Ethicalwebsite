<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumerConnectController extends Controller
{
    public function index()
    {
        
        return view('consumer.connect');
    }
}

