<?php

namespace App\Http\Controllers;

use App\Models\sardaniakan;
use App\Models\sardanikar;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function invoice(sardaniakan $sardani)
    {
        $sardani->load('sardanikar');

        return view('print.invoice', [
            'sardani' => $sardani
        ]);
    }
}
