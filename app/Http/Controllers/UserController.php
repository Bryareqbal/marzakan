<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule as ValidationRule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when(!empty($request->name), function (Builder $query) use ($request) {
            $query->where('name', 'like', "%{$request->name}%");
        })->when($request->phone_no, function (Builder $query) use ($request) {
            $query->where('phone_no', 'like', "%{$request->phone_no}%");
        })->latest()->simplePaginate(25);
        $Roles = Rule::whereNotIn('id', [1])->get();
        return view('Admin.users.users', ['Roles'=>$Roles,'users'=>$users]);
    }

    public function userAdd(Request $request)
    {

        $validated = Validator::make($request->all(), [
          'name'=> ['required', 'string', 'max:255'],
          'username'=> ['required', 'alpha_dash', 'max:255', 'unique:users,username'],
          'password'=> ['required', 'string', 'min:8', 'max:255', 'confirmed'],
          'gender'=> ['required', 'boolean'],
          'address'=> ['required', 'string', 'max:255'],
          'phone_no'=> ['required', 'string', 'digits:11'],
          'role_id'=> ['required', 'integer', 'exists:rules,id'],

        ], [], [
          'name'=>'(ناو)',
          'username'=>'(ناوی بەکارهێنەر)',
          'password'=>'(وشەی نهێنی)',
          'gender'=>'(ڕەگەز)',
          'address'=>'(ناونیشان)',
          'phone_no'=>'(ژ.مۆبایل)',
          'role_id'=>'(ئەرک)',
        ])->validate();

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->username = $request->username;
        $newUser->password = Hash::make($request->password);
        $newUser->gender = $request->gender;
        $newUser->address = $request->address;
        $newUser->phone_no = $request->phone_no;
        $newUser->rule_id = $request->role_id;
        if($newUser->save()) {
            return redirect()->back()->with('success', 'بەسەرکەتووی زیادکرا .');

        };

    }
    public function editUser(Request $request)
    {
        $user = User::with(['rule'])->where('id', $request->id)->firstOrFail();
        $Roles = Rule::whereNotIn('id', [1])->get();
        return view('Admin.users.editUser', ['user' => $user,'Roles'=>$Roles]);

    }
    public function saveUser(Request $request)
    {

        $editUser = User::with(['rule'])->where('id', $request->id)->firstOrFail();
        $validated = Validator::make($request->all(), [
          'name'=> ['required', 'string', 'max:255'],
          'username'=> ['required', 'alpha_dash', 'max:255', ValidationRule::unique('users', 'username')->ignore($editUser->id)],
          'gender'=> ['required', 'boolean'],
          'isActive'=> ['required', 'boolean'],
          'address'=> ['required', 'string', 'max:255'],
          'phone_no'=> ['required', 'string', 'digits:11'],
          'role_id'=> ['required', 'integer', 'exists:rules,id'],

        ], [], [
          'name'=>'(ناو)',
          'username'=>'(ناوی بەکارهێنەر)',
          'gender'=>'(ڕەگەز)',
          'isActive'=>'(باری بەکارهێنەر)',
          'address'=>'(ناونیشان)',
          'phone_no'=>'(ژ.مۆبایل)',
          'role_id'=>'(ئەرک)',
        ])->validate();

        $editUser->name = $request->name;
        $editUser->username = $request->username;
        $editUser->password = bcrypt($request->password);
        $editUser->gender = $request->gender;
        $editUser->isActive = $request->isActive;
        $editUser->address = $request->address;
        $editUser->phone_no = $request->phone_no;
        $editUser->rule_id = $request->role_id;
        if($editUser->save()) {
            return redirect()->route('users')->with('success', 'بەسەرکەتووی نوێکرایەوە .');

        };

    }

    public function editPassword(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail();
        return view('Admin.users.editPassword', ['user' => $user]);
    }
    public function savePassword(Request $request)
    {

        $editPassword = User::where('id', $request->id)->firstOrFail();
        Validator::make($request->all(), [
           'password'=> ['required', 'string', 'min:8', 'max:255', 'confirmed'],
         ], [], [
           'password'=>'(وشەی نهێنی)',
         ])->validate();

        if($request->password !== null) {
            $editPassword->password = bcrypt($request->password);
        }
        if($editPassword->save()) {
            return redirect()->route('users')->with('success', 'بەسەرکەتووی نوێکرایەوە .');
        }
    }
}
