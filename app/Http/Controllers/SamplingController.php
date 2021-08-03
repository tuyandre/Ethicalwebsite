<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SamplingController extends Controller
{
    public function index()
    {
        
        return view('consumer.sampling');
    }
}
