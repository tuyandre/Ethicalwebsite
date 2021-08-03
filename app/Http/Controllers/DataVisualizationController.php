<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataVisualizationController extends Controller
{
    public function index()
    {
        
        return view('consumer.data-visualization');
    }
}
