<?php

namespace App\Http\Controllers;

use App\Models\sardanikar;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function invoice(sardanikar $sardanikar)
    {

        return view('print.invoice', [
            'sardanikar' => $sardanikar
        ]);
    }
}
