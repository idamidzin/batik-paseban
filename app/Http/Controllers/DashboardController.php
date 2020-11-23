<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$batik = \App\Models\Batik::get();
    	$batik_count = $batik->count();
        return view('dashboard', compact('batik_count'));
    }
}
