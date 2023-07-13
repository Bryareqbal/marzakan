<?php

namespace App\Http\Controllers;

use App\Models\sardanikar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class sardanikarController extends Controller
{
    public function index()
    {
        $totalMoney = sardanikar::where('user_id', Auth::id())->sum('mount_of_money');
        $counter = sardanikar::where('user_id', Auth::id())->count();
        return view('sardanikar.sardanikar', [
            'totalMoney' => $totalMoney,
            'counter' => $counter,
        ]);
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
            "img" => ['required', 'file', 'image'],
            "status" => ['required', Rule::in(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::in(['free', 5000, 10000])],
            "targeted_person" => ['required', 'string', 'max:255'],
            "no_of_visitors" => ['required', 'numeric', 'min:0'],
            "passport_expire_date" => ['required', 'date'],
            "issuing_authority" => ['required', 'string'],
        ], [], [
            "name" => '(ناو)',
            "nickname" => '(نازناو)',
            "password_number" => '(ژ.پاسپۆرت)',
            "birth_date" => '(رۆژی لەدایکبوون)',
            "gender" => '(ڕەگەز)',
            "nation" => '(نەتەوە)',
            "phone" => '(ژ.مۆبایل)',
            "purpose_of_coming" => '(هۆکاری هاتن)',
            "address" => '(ناونیشانی شوێنی مانەوە)',
            "img" => '(وێنە)',
            "status" => '(حاڵەت)',
            "mount_of_money" => '(بری پارە)',
            "targeted_person" => '(ناوی ئەو کەسەی دەچێتە لای)',
            "no_of_visitors" => '(ژمارەی سەردانیکەران)',
            "passport_expire_date" => '(بەرواری بەسەرچوونی پاسپۆرت)',
            "issuing_authority" => '(دەسەڵاتی دەرکردن)',
        ])->validate();

        $newSardanikar = new sardanikar();
        $newSardanikar->name = $request->name;
        $newSardanikar->nickname = $request->nickname;
        $newSardanikar->password_number = $request->password_number;
        $newSardanikar->birth_date = $request->birth_date;
        $newSardanikar->gender = $request->gender;
        $newSardanikar->nation = $request->nation;
        $newSardanikar->phone = $request->phone;
        $newSardanikar->purpose_of_coming = $request->purpose_of_coming;
        $newSardanikar->address = $request->address;
        $newSardanikar->img = $request->img;
        $newSardanikar->status = $request->status;
        $newSardanikar->mount_of_money = $request->mount_of_money === 'free' ? 0 : $request->mount_of_money;
        $newSardanikar->targeted_person = $request->targeted_person;
        $newSardanikar->no_of_visitors = $request->no_of_visitors;
        $newSardanikar->passport_expire_date = $request->passport_expire_date;
        $newSardanikar->issuing_authority = $request->issuing_authority;
        $newSardanikar->img = Storage::disk('public')->put('sardanikar/', $request->file('img'));
        $newSardanikar->user_id = Auth::id();

        $newSardanikar->save();

        return redirect()->back()->with('success', 'بەسەرکەوتووی تۆمارکرا.')->with('id', $newSardanikar->id);
    }
}
