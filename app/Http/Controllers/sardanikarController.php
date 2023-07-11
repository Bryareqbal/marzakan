<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sardanikarController extends Controller
{
    public function index()
    {
        return view('sardanikar.index');
    }
}
