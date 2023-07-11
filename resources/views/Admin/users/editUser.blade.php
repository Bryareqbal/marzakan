@extends('layouts.Auth')
@section('title', 'گۆرینی بەکارهێنەر')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-white bg-green-600 text-white">
                        <svg viewBox="0 0 24 24" class="w-8 h-8" fill="#fff" xmlns="http://www.w3.org/2000/svg"
                            stroke="#22c55e">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                    stroke="#22c55e" stroke-width="1.5"></path>
                                <path d="M8 12H16" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                                <path d="M8 8H16" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                                <path d="M8 16H13" stroke="#22c55e" stroke-width="1.5" stroke-linecap="round"></path>
                            </g>
                        </svg>
                    </span>
                    <h1 class="text-xl">گۆرینی بەکارهێنەر</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    گۆرینی بەکارهێنەر
                </h1>
            </div>
            <form method="POST" action="{{ route('saveUser', $user->id) }}" class="mt-6 max-w-7xl">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4">

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناو </legend>
                            <x-input class="w-full" name="name" id="name" type="text"
                                value="{{ $user->name }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی بەکارهێنەر</legend>
                            <x-input class="w-full" name="username" id="username" type="text"
                                value="{{ $user->username }}" />
                            <x-error message="username" />
                        </fieldset>
                    </div>


                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-3">
                            <legend class="px-2">ڕەگەز</legend>
                            <div class="flex space-x-reverse space-x-3 p-1">
                                <label for="gender">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="gender" value="{{ 1 }}" name="gender"
                                        {{ old('gender', $user->gender) === 1 ? 'checked' : '' }} />
                                    نێر
                                </label>
                                <label for="gender2">
                                    <input type="radio" value="{{ 0 }}"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="gender2" name="gender"
                                        {{ old('gender', $user->gender) === 0 ? 'checked' : '' }} />
                                    مێ
                                </label>

                            </div>
                            <x-error message="gender" />

                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشان</legend>
                            <x-input class="w-full" name="address" id="address" type="text"
                                value="{{ $user->address }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارە تەلەفون</legend>
                            <x-input class="w-full" name="phone_no" id="phone_no" maxLength="11" type="text"
                                value="{{ $user->phone_no }}" />
                            <x-error message="phone_no" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ئەرک </legend>
                            <x-select name="role_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($Roles as $key => $rule)
                                    <option @selected($rule->id == $user->rule_id) value="{{ $rule->id }}">
                                        {{ $rule->rule }}</option>
                                @endforeach
                            </x-select>
                            <x-error message="role_id" />
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex focus:outline-none items-center space-x-1 space-x-reverse">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                            <span>گۆرین</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>

        </section>
    @endsection
