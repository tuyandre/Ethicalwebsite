<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FutureOfCanadianShoppingController extends Controller
{
    public function index()
    {
        
        return view('resources.papers.future-canadian-shopping-centers');
    }
}
