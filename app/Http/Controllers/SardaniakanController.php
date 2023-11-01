<?php

namespace App\Http\Controllers;

use App\Models\sardaniakan;
use App\Models\sardanikar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
        return view('sardaniakan.index', [
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

    public function showSardaniakan(Request $request)
    {
        $sardaniakan = sardaniakan::with('sardanikar')->where('karmand_id', Auth::id())->when(!empty($request->search), function (Builder $query) use ($request) {
            $query->whereHas('sardanikar', function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%")
                    ->orWhere('passport_number', 'like', "%{$request->search}%")
                    ->orWhere('phone', 'like', "%{$request->search}%")
                    ->orWhere('nickname', 'like', "%{$request->search}%");
            });
        })->paginate(25);

        return view('sardaniakan.showSardaniakan', [
            'sardaniakan' => $sardaniakan,
        ]);
    }

    public function editSardani(sardaniakan $sardani)
    {
        $sardani->load('sardanikar');
        return view('sardaniakan.editSardani', ['sardani' => $sardani]);
    }

    public function updateSardani($sardani, Request $request)
    {
        Validator::validate($request->all(), [
            "purpose_of_coming" => ['required', 'string'],
            "address" => ['required', 'string'],
            "status" => ['required', Rule::in(['coming', 'leaving'])],
            "mount_of_money" => ['required', Rule::in(['free', 5000, 10000])],
            "targeted_person" => ['nullable', 'string', 'max:255'],
            "no_of_visitors" => ['nullable', 'numeric', 'min:0'],
            // "sardanikar_id" => ['required', 'numeric', 'exists:sardanikars,id'],
        ]);
        $sardani = sardaniakan::find($sardani);
        $sardani->purpose_of_coming = $request->purpose_of_coming;
        $sardani->address = $request->address;
        $sardani->status = $request->status;
        $sardani->mount_of_money = $request->mount_of_money;
        $sardani->targeted_person = $request->targeted_person;
        $sardani->no_of_visitors = $request->no_of_visitors;
        $sardani->save();

        return redirect()->back()->with('success', 'بەسەرکەوتووی تۆمارکرا.');
    }
}
