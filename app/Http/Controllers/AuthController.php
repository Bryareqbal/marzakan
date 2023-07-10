<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'username' => ['required','string','alpha_dash',Rule::exists('users', 'username')],
            'password' => ['required','string','min:8','max:255'],
        ], [], [
            'username' => '( ناوی بەکارهێنەر )',
            'password' => 'وشەی نهێنی',
        ]);

        if($validated->fails()) {
            return redirect()->back()->withErrors($validated->errors())->with('message', 'دڵنیابەرەوە لە زانیارێکان')->withInput($request->all());
        }

        try {
            DB::transaction(function () use ($request, $validated) {
                $user = User::where('username', $request->username)->first();
                if(!$user) {
                    return throw new \Exception('بەکارهێنەر نەدۆزرایەوە');
                }
                if(!$user || !Hash::check($request->password, $user->password)) {
                    return redirect()->back()->withErrors($validated->errors())->with('message', ' زانیارێکان دروست نین')->withInput($request->all());
                }

                Auth::attempt(['username' => $request->username, 'password' => $request->password], true);
                return redirect()->route('test');

            });
        } catch(\Exception $e) {
            return 'بەکارهێنەر نەدۆزرایەوە';
        }


    }
}
