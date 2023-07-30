<?php

namespace App\Http\Controllers;

use App\Models\sardaniakan;
use App\Models\sardanikar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class SardaniakanController extends Controller
{
    public function index(Request $request)
    {

        if ($request->filled('search')) {
            $sardanikar = sardanikar::where('passport_number', $request->search)->first();
            $request->flash();
        }

        $totalMoney = sardaniakan::where('karmand_id', Auth::id())->sum('mount_of_money');
        $counter = sardaniakan::where('karmand_id', Auth::id())->count();
        return view('sardanikaran.index', [
            'totalMoney' => $totalMoney,
            'counter' => $counter,
            'sardanikar' => $sardanikar ?? null,
        ]);
    }

    public function addSardanikaran(Request $request)
    {
        Validator::make($request->all(), [
            "purpose_of_coming" => ['required', 'string'],
            "address" => ['required', 'string'],
            "status" => ['required', Rule::in(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::in(['free', 5000, 10000])],
            "targeted_person" => ['nullable', 'string', 'max:255'],
            "no_of_visitors" => ['nullable', 'numeric', 'min:0'],
            "sardanikar_id" => ['required', 'numeric', 'exists:sardanikars,id'],

        ], [], [
            "purpose_of_coming" => '(هۆکاری هاتن)',
            "address" => '(ناونیشانی شوێنی مانەوە)',
            "status" => '(حاڵەت)',
            "mount_of_money" => '(بری پارە)',
            "targeted_person" => '(ناوی ئەو کەسەی دەچێتە لای)',
            "no_of_visitors" => '(ژمارەی سەردانیکەران)',
            "sardanikar_id" => '(سەردانیکەر)',

        ])->validate();

        $sarparshtyar = User::with(['sarparshtyar'])->find(Auth::id());
        $newSardany = new sardaniakan();
        $newSardany->purpose_of_coming = $request->purpose_of_coming;
        $newSardany->address = $request->address;
        $newSardany->status = $request->status;
        $newSardany->mount_of_money = $request->mount_of_money === 'free' ? 0 : $request->mount_of_money;
        $newSardany->targeted_person = $request->targeted_person;
        $newSardany->no_of_visitors = $request->no_of_visitors;
        $newSardany->sardanikar_id = $request->sardanikar_id;
        $newSardany->karmand_id = Auth::id();
        if ($newSardany->save()) {
            return redirect()->back()->with('success', 'بەسەرکەوتووی تۆمارکرا.')->with('id', $newSardany->id);
        }
    }
}
