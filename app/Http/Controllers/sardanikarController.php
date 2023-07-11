<?php

namespace App\Http\Controllers;

use App\Models\sardanikar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class sardanikarController extends Controller
{
    public function index()
    {
        return view('sardanikar.index');
    }

    public function addSardanikar(Request $request)
    {
        Validator::make($request->all(), [
            "name" => ['required', 'string', 'max:255'],
            "nickname" => ['required', 'string', 'max:255'],
            "password_number" => ['required', 'string'],
            "birth_date" => ['required', 'date'],
            "gender" => ['required', 'boolean'],
            "nation" => ['required', 'string', 'max:255'],
            "phone" => ['required', 'min:11', 'max:11'],
            "purpose_of_coming" => ['required', 'string'],
            "address" => ['required', 'string'],
            "img" => ['required', 'image', 'file'],
            "status" => ['required', Rule::enum(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::enum(['free', '5000', '10000'])],
            "targeted_person" => ['required', 'string', 'max:255'],
            "no_of_visitors" => ['required', 'numeric', 'min:0'],
            "passport_expire_date" => ['required', 'date'],
            "issuing_authority" => ['required', 'string'],
        ]);

        $newSardanikar = new sardanikar();
    }
}
