@extends('layouts.Auth')
@section('title', 'گۆرینی بەکارهێنەر')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white px-2 py-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-8 w-8 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
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
                                value="{{ old('name', $user->name) }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی بەکارهێنەر</legend>
                            <x-input class="w-full" name="username" id="username" type="text"
                                value="{{ old('username', $user->username) }}" />
                            <x-error message="username" />
                        </fieldset>
                    </div>


                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-3">
                            <legend class="px-2">ڕەگەز</legend>
                            <div class="flex space-x-3 space-x-reverse p-1">
                                <label for="gender">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="gender" value="{{ 1 }}" name="gender"
                                        @checked(old('gender', $user->gender) == 1) />
                                    نێر
                                </label>
                                <label for="gender2">
                                    <input type="radio" value="{{ 0 }}"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="gender2" name="gender" @checked(old('gender', $user->gender) == 0) />
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
                                value="{{ old('address', $user->address) }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارە تەلەفون</legend>
                            <x-input class="w-full" name="phone_no" id="phone_no" maxLength="11" type="text"
                                value="{{ old('phone_no', $user->phone_no) }}" />
                            <x-error message="phone_no" />
                        </fieldset>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-3">
                            <legend class="px-2">باری بەکارهێنەر</legend>
                            <div class="flex space-x-3 space-x-reverse p-1">
                                <label for="isActive">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="isActive" value="{{ 1 }}" name="isActive"
                                        {{ old('isActive', $user->isActive) == 1 ? 'checked' : '' }} />
                                    چالاک
                                </label>
                                <label for="isActive2">
                                    <input type="radio" value="{{ 0 }}"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="isActive2" name="isActive"
                                        {{ old('isActive', $user->isActive) == 0 ? 'checked' : '' }} />
                                    ناچالاک
                                </label>

                            </div>
                            <x-error message="isActive" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ئەرک </legend>

                            <x-select name="role_id" id="role">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($Roles as $key => $role)
                                    <option @selected(old('role_id', $user->rule_id) == $role->id) value="{{ $role->id }}">
                                        {{ $role->rule }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-error message="role_id" />
                        </fieldset>
                    </div>

                    <div class="hidden flex-col space-y-3" id="sarparshtyar">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">سەرپەرشتیار </legend>
                            <x-select name="sarparshtyar_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($sarparshtyarakan as $key => $sarparshtyar)
                                    <option @selected(old('sarparshtyar_id', $user->sarparshtyar_id) == $sarparshtyar->id) value="{{ $sarparshtyar->id }}">
                                        {{ $sarparshtyar->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-error message="sarparshtyar_id" />
                        </fieldset>
                    </div>
                    <div class="hidden flex-col space-y-3" id="marz">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">مەرز </legend>
                            <x-select name="marz_id">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($marzakan as $key => $marz)
                                    <option @selected(old('marz_id', $user->marz_id) === $marz->id) value="{{ $marz->id }}">
                                        {{ $marz->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-error message="marz_id" />
                        </fieldset>
                    </div>

                </div>
                {{ $errors }}
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-green-500 to-green-600 px-6 py-1 text-white">
                            <span>گۆرین</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>
            @push('scripts')
                <script src="{{ asset('js/users.js') }}"></script>
            @endpush
        </section>
    @endsection
