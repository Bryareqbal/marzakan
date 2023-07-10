<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarzakanController extends Controller
{
    public function index()
    {
        return view('marzakan.marzakan');
    }
}
