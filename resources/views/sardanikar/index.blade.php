@extends('layouts.Auth')

@section('title', 'سەردانیکەر')
@section('content')
    <div class="container mx-auto">
        <form class="mt-6 max-w-7xl mx-auto space-y-5" action="{{ route('add-sarparshtyar') }}" method="POST">
            <div class="w-2/12 mx-auto">
                <img src="" class="object-cover object-center w-full aspect-square" />
            </div>
            @csrf
            <div class="flex divide-x-2 divide-x-reverse items-center space-x-reverse w-full">

                <div class="basis-full grid grid-cols-1 gap-4 md:grid-cols-2 px-5">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">جۆری تۆمارکردنی زانیاری</legend>
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی چواری</legend>
                            <x-input name="name" id="name" type="text" class="w-full"
                                value="{{ old('name') }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">نازناو</legend>
                            <x-input name="nickname" id="nickname" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('nickname') }}" />
                            <x-error message="nickname" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارەی پاسپۆرت</legend>
                            <x-input name="password_number" id="password_number" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('password_number') }}" />
                            <x-error message="password_number" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بەرواری لەدایکبوون</legend>
                            <x-input name="password_number" id="password_number" type="date"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('password_number') }}" />
                            <x-error message="password_number" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ڕەگەز</legend>
                            <x-select name="gender" id="gender">
                                <option value="male" @selected(old('gender') === 'male')>نێر</option>
                                <option value="female" @selected(old('gender') === 'female')>مێ</option>
                            </x-select>
                            <x-error message="gender" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">نەتەوە</legend>
                            <x-input name="nation" id="nation" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full " value="{{ old('nation') }}" />
                            <x-error message="nation" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                            <x-input name="passport_expire_date" id="passport_expire_date" type="date"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('passport_expire_date') }}" />
                            <x-error message="passport_expire_date" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                            <x-input name="issuing_authority" id="issuing_authority" type="date"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('issuing_authority') }}" />
                            <x-error message="issuing_authority" />
                        </fieldset>
                    </div>
                </div>

                <div class="basis-full grid grid-cols-1 gap-4 md:grid-cols-2 px-5">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.پەیوەندی</legend>
                            <x-input name="phone" id="phone" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full " value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">هۆکاری هاتن</legend>
                            <x-input name="purpose_of_coming" id="purpose_of_coming" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('purpose_of_coming') }}" />
                            <x-error message="purpose_of_coming" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشانی شوێنی مانەوە</legend>
                            <x-input name="address" id="address" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('address') }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">حاڵەت</legend>
                            <x-select name="status" id="status" type="date">
                                <option value="coming" @selected(old('status') === 'coming')>هاتن</option>
                                <option value="leaving" @selected(old('status') === 'leaving')>ڕؤشتن</option>
                            </x-select>
                            <x-error message="status" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بڕی پارە</legend>
                            <x-select name="mount_of_money" id="mount_of_money">
                                <option value="free" @selected(old('mount_of_money') === 'free')>بێبەرامبەر</option>
                                <option value="5000" @selected(old('mount_of_money') === '5000')>5,000</option>
                                <option value="10000" @selected(old('mount_of_money') === '10000')>10,000</option>
                            </x-select>
                            <x-error message="mount_of_money" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی ئەو کەسەی دەچێتە لای</legend>
                            <x-input name="targeted_person" id="targeted_person" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('targeted_person') }}" />
                            <x-error message="targeted_person" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارەی سەردانیکەران</legend>
                            <x-input name="no_of_visitors" id="no_of_visitors" type="text"
                                class=" rounded-lg border border-slate-300 pr-3 py-2 w-full "
                                value="{{ old('no_of_visitors') }}" />
                            <x-error message="no_of_visitors" />
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-20">
                <button type="submit" class="flex items-center space-x-1 space-x-reverse">
                    <div
                        class="flex items-center space-x-3 space-x-reverse rounded-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                        <span>زیادکردن</span>
                    </div>
                </button>
            </div>
            <hr class="mt-4  border border-dashed border-slate-500">
        </form>
    </div>
@endsection
