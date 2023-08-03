@extends('layouts.Auth')

@section('title', 'گۆڕانکاری لە سەردانیکەر')

@section('content')
    <div class="mx-auto mt-5 max-w-5xl">
        <form action="{{ route('update-sardanikar', ['id' => $sardanikar->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch" />
            <div class="mx-auto flex flex-col items-center space-y-3">
                <div class="w-[15rem]">
                    <video id="video" width="320" height="240"
                        class="hidden aspect-square w-full rounded object-cover object-center shadow" autoplay></video>
                    <canvas id="canvas" class="hidden aspect-square w-full rounded object-cover object-center shadow"
                        width="320" height="240"></canvas>
                    <img src="{{ Storage::url($sardanikar->img) }}" id="image"
                        class="aspect-square w-full rounded object-cover object-center shadow" alt="">
                    <input type="file" name="image" class="sr-only" id="img" onchange="uploadImage()" />

                </div>
                <div class="space-x-3 space-x-reverse">
                    <button type="button" class="rounded-md bg-green-500 px-3 py-2 text-white shadow"
                        id="start-camera">کردنەوەی کامێرا</button>
                    <button type="button" class="rounded-md bg-green-500 px-3 py-2 text-white shadow" id="click-photo">
                        وێنە گرتن</button>
                    <label class="inline rounded-md bg-green-500 px-3 py-2 text-white shadow" for="img">زیادکردنی
                        وێنە</label>
                </div>
                <input type="file" name="img" class="sr-only" id="img" />
                <x-error message="img" />
            </div>
            <div class="mt-10 flex basis-full flex-col space-y-5">
                <div class="flex justify-center">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ئۆتۆماتیکی</legend>
                            <input name="information" id="information" type="file" class="w-full" />
                        </fieldset>
                    </div>
                </div>
                <div id="manual_div" class="grid grid-cols-1 gap-4 p-5 lg:grid-cols-2">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی چواری</legend>
                            <x-input name="name" id="name" type="text" class="w-full"
                                value="{{ old('name', $sardanikar->name) }}" />
                            <x-error message="name" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">نازناو</legend>
                            <x-input name="nickname" id="nickname" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('nickname', $sardanikar->nickname) }}" />
                            <x-error message="nickname" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژمارەی پاسپۆرت</legend>
                            <x-input name="passport_number" id="passport_number" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3 uppercase"
                                value="{{ old('passport_number', $sardanikar->passport_number) }}" />
                            <x-error message="passport_number" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بەرواری لەدایکبوون</legend>
                            <x-input name="birth_date" id="birth_date" type="date"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('birth_date', $sardanikar->birth_date) }}" />
                            <x-error message="birth_date" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ڕەگەز</legend>
                            <x-select name="gender" id="gender">
                                <option value="{{ 1 }}" @selected(old('gender', $sardanikar->gender) === true)>نێر
                                </option>
                                <option value="{{ 0 }}" @selected(old('gender', $sardanikar->gender) === false)>مێ
                                </option>
                            </x-select>
                            <x-error message="gender" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">نەتەوە</legend>
                            <x-input name="nation" id="nation" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('nation', $sardanikar->nation) ?? 'IRAN' }}" />
                            <x-error message="nation" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                            <x-input name="passport_expire_date" id="passport_expire_date" type="date"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('passport_expire_date', $sardanikar->passport_expire_date) }}" />
                            <x-error message="passport_expire_date" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                            <x-input name="issuing_authority" id="issuing_authority" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('issuing_authority', $sardanikar->issuing_authority) }}" />
                            <x-error message="issuing_authority" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.پەیوەندی</legend>
                            <x-input name="phone" id="phone" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3" maxlength="11"
                                value="{{ old('phone', $sardanikar->phone) }}" maxLength="11" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">نەتەوە</legend>
                            <x-input name="nation" id="nation" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('nation', $sardanikar->nation ?? 'IRAN') }}" />
                            <x-error message="nation" />
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <button class="rounded-md bg-green-500 px-3 py-2 text-white shadow-md">تۆمارکردن</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="{{ asset('js/sardanikar.js') }}"></script>
    @endpush
@endsection
