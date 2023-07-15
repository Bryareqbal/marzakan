@extends('layouts.Auth')

@section('title', 'گۆڕانکاری لە سەردانیکەر')
@section('content')
    <div class="container mx-auto px-3">
        <form class="mx-auto mt-6 max-w-7xl space-y-5"
            action="{{ route('update-sardanikar', [
                'id' => $sardanikar->id,
            ]) }}" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="_method" value="patch" />
            <div class="mx-auto w-[15rem]">
                <label for="img">
                    <img src="{{ Storage::url($sardanikar->img) }}"
                        class="aspect-square w-full rounded object-cover object-center shadow" id="image" />
                    <input type="file" onchange="uploadImage()" name="img" class="hidden" id="img" />
                </label>
                <x-error message="img" />
            </div>
            @csrf
            <div
                class="flex w-full flex-col items-center space-x-reverse divide-y-2 md:flex-row md:divide-y-0 md:divide-x-2 md:divide-x-reverse">

                <div class="flex basis-full flex-col space-y-5">
                    <div class="flex justify-center">
                        <div class="flex flex-col space-y-3">
                            <fieldset class="space-x-re space-x-5 rounded-lg border-2 border-green-500 p-4">
                                <legend class="px-2">جۆری تۆمارکردنی زانیاری</legend>
                                <label for="type_entering">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        onchange="showManualInput()" value="manual" name="type_entering" checked />
                                    دەستی
                                </label>
                                <label for="type_entering2">
                                    <input type="radio"
                                        class="h-4 w-4 accent-green-600 focus:ring-1 focus:ring-green-600 focus:ring-offset-1"
                                        id="type_entering2" onchange="showAutoInput()" value="auto"
                                        name="type_entering" />
                                    ئۆتۆماتیکی
                                </label>
                            </fieldset>
                        </div>
                    </div>
                    <div id="manual_div" class="grid grid-cols-1 gap-4 p-5 lg:grid-cols-2">
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ناوی چواری</legend>
                                <x-input name="name" id="name" type="text" class="w-full"
                                    value="{{ $sardanikar->name }}" />
                                <x-error message="name" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نازناو</legend>
                                <x-input name="nickname" id="nickname" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->nickname }}" />
                                <x-error message="nickname" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ژمارەی پاسپۆرت</legend>
                                <x-input name="passport_number" id="passport_number" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3 uppercase"
                                    value="{{ $sardanikar->passport_number }}" />
                                <x-error message="passport_number" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری لەدایکبوون</legend>
                                <x-input name="birth_date" id="birth_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->birth_date }}" />
                                <x-error message="birth_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ڕەگەز</legend>
                                <x-select name="gender" id="gender">
                                    <option value="{{ 1 }}" @selected($sardanikar->gender === true)>نێر</option>
                                    <option value="{{ 0 }}" @selected($sardanikar->gender === false)>مێ</option>
                                </x-select>
                                <x-error message="gender" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نەتەوە</legend>
                                <x-input name="nation" id="nation" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->nation }}" />
                                <x-error message="nation" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                                <x-input name="passport_expire_date" id="passport_expire_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->passport_expire_date }}" />
                                <x-error message="passport_expire_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                                <x-input name="issuing_authority" id="issuing_authority" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->issuing_authority }}" />
                                <x-error message="issuing_authority" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="auto_div" class="hidden grid-cols-1 gap-4 p-5 lg:grid-cols-2">
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ناوی چواری</legend>
                                <x-input disabled name="name" id="name" type="text" class="w-full"
                                    value="{{ $sardanikar->name }}" />
                                <x-error message="name" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نازناو</legend>
                                <x-input disabled name="nickname" id="nickname" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->nickname }}" />
                                <x-error message="nickname" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ژمارەی پاسپۆرت</legend>
                                <x-input disabled name="passport_number" id="passport_number" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3 uppercase"
                                    value="{{ $sardanikar->passport_number }}" />
                                <x-error message="passport_number" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری لەدایکبوون</legend>
                                <x-input disabled name="birth_date" id="birth_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->birth_date }}" />
                                <x-error message="birth_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ڕەگەز</legend>
                                <x-select disabled name="gender" id="gender">
                                    <option value="{{ 1 }}" @selected($sardanikar->gender === true)>نێر</option>
                                    <option value="{{ 0 }}" @selected($sardanikar->gender === true)>مێ</option>
                                </x-select>
                                <x-error message="gender" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نەتەوە</legend>
                                <x-input disabled name="nation" id="nation" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->nation }}" />
                                <x-error message="nation" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                                <x-input disabled name="passport_expire_date" id="passport_expire_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->passport_expire_date }}" />
                                <x-error message="passport_expire_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                                <x-input disabled name="issuing_authority" id="issuing_authority" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ $sardanikar->issuing_authority }}" />
                                <x-error message="issuing_authority" />
                            </fieldset>
                        </div>
                    </div>
                </div>

                <div class="grid basis-full grid-cols-1 gap-4 p-5 lg:grid-cols-2">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.پەیوەندی</legend>
                            <x-input name="phone" id="phone" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ $sardanikar->phone }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">هۆکاری هاتن</legend>
                            <x-input name="purpose_of_coming" id="purpose_of_coming" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ $sardanikar->purpose_of_coming }}" />
                            <x-error message="purpose_of_coming" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشانی شوێنی مانەوە</legend>
                            <x-input name="address" id="address" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ $sardanikar->address }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">حاڵەت</legend>
                            <x-select name="status" id="status" type="date">
                                <option value="coming" @selected($sardanikar->status === 'coming')>هاتن</option>
                                <option value="leaving" @selected($sardanikar->status === 'leaving')>ڕۆشتن</option>
                            </x-select>
                            <x-error message="status" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بڕی پارە</legend>
                            <x-select name="mount_of_money" id="mount_of_money">
                                <option value="{{ 5000 }}" @selected($sardanikar->mount_of_money == 5000) selected>5,000</option>
                                <option value="{{ 10000 }}" @selected($sardanikar->mount_of_money == 10000)>10,000</option>
                                <option value="free" @selected($sardanikar->mount_of_money == 0)>بێبەرامبەر
                                </option>
                            </x-select>
                            <x-error message="mount_of_money" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی ئەو کەسەی دەچێتە لای</legend>
                            <x-input name="targeted_person" id="targeted_person" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ $sardanikar->targeted_person }}" />
                            <x-error message="targeted_person" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایلی ئەو کەسەی سەردانی دەکات</legend>
                            <x-input name="no_of_visitors" id="no_of_visitors" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ $sardanikar->no_of_visitors }}" />
                            <x-error message="no_of_visitors" />
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="mt-20 flex justify-center">
                <button type="submit" class="flex items-center space-x-1 space-x-reverse">
                    <div
                        class="flex items-center space-x-3 space-x-reverse rounded-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                        <span>گۆڕین</span>
                    </div>
                </button>
            </div>
            <hr class="mt-4 border border-dashed border-slate-500">
        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('js/sardanikar.js') }}"></script>
    @endpush
@endsection
