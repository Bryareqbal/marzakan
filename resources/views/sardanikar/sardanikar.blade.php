@extends('layouts.Auth')

@section('title', 'سەردانیکەر')
@section('content')
    <div class="container mx-auto px-3">
        <div class="mt-10 flex w-full flex-col justify-between space-y-5 lg:flex-row lg:space-y-0">
            <h1 class="inline rounded-md bg-green-500 p-2 text-white shadow">کۆی گشتی پارە:

                <span>{{ number_format($totalMoney, 0, '.', ',') }}</span>
            </h1>
            <a href="{{ route('show-sardanikar') }}" class="inline-block rounded-md bg-green-500 p-2 text-white shadow">ژمارەی
                سەردانیکەران:

                <span>{{ number_format($counter, 0, '.', ',') }}</span>
            </a>
        </div>
        <form class="mx-auto mt-6 max-w-7xl space-y-5" action="{{ route('add-sardanikar') }}" method="POST"
            enctype="multipart/form-data">
            <div class="mx-auto w-[15rem]">
                <label for="img">
                    <img src="{{ asset('assets/img/default-image.png') }}"
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
                                    value="{{ old('name') }}" />
                                <x-error message="name" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نازناو</legend>
                                <x-input name="nickname" id="nickname" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('nickname') }}" />
                                <x-error message="nickname" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ژمارەی پاسپۆرت</legend>
                                <x-input name="passport_number" id="passport_number" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('passport_number') }}" />
                                <x-error message="passport_number" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری لەدایکبوون</legend>
                                <x-input name="birth_date" id="birth_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('birth_date') }}" />
                                <x-error message="birth_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ڕەگەز</legend>
                                <x-select name="gender" id="gender">
                                    <option value="{{ 1 }}" @selected(old('gender') === true)>نێر</option>
                                    <option value="{{ 0 }}" @selected(old('gender') === false)>مێ</option>
                                </x-select>
                                <x-error message="gender" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نەتەوە</legend>
                                <x-input name="nation" id="nation" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('nation') ?? 'IRAN' }}" />
                                <x-error message="nation" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                                <x-input name="passport_expire_date" id="passport_expire_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('passport_expire_date') }}" />
                                <x-error message="passport_expire_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                                <x-input name="issuing_authority" id="issuing_authority" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('issuing_authority') }}" />
                                <x-error message="issuing_authority" />
                            </fieldset>
                        </div>
                    </div>
                    <div id="auto_div" class="hidden grid-cols-1 gap-4 p-5 lg:grid-cols-2">
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ناوی چواری</legend>
                                <x-input disabled name="name" id="name" type="text" class="w-full"
                                    value="{{ old('name') }}" />
                                <x-error message="name" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نازناو</legend>
                                <x-input disabled name="nickname" id="nickname" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('nickname') }}" />
                                <x-error message="nickname" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ژمارەی پاسپۆرت</legend>
                                <x-input disabled name="passport_number" id="passport_number" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('passport_number') }}" />
                                <x-error message="passport_number" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری لەدایکبوون</legend>
                                <x-input disabled name="birth_date" id="birth_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('birth_date') }}" />
                                <x-error message="birth_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">ڕەگەز</legend>
                                <x-select disabled name="gender" id="gender">
                                    <option value="{{ 1 }}" @selected(old('gender') === true)>نێر</option>
                                    <option value="{{ 0 }}" @selected(old('gender') === true)>مێ</option>
                                </x-select>
                                <x-error message="gender" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">نەتەوە</legend>
                                <x-input disabled name="nation" id="nation" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('nation') }}" />
                                <x-error message="nation" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                                <x-input disabled name="passport_expire_date" id="passport_expire_date" type="date"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('passport_expire_date') }}" />
                                <x-error message="passport_expire_date" />
                            </fieldset>
                        </div>
                        <div class="flex flex-col space-y-3">
                            <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                                <x-input disabled name="issuing_authority" id="issuing_authority" type="text"
                                    class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                    value="{{ old('issuing_authority') }}" />
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
                                value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">هۆکاری هاتن</legend>
                            <x-input name="purpose_of_coming" id="purpose_of_coming" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('purpose_of_coming') ?? 'سەردانیکردن' }}" />
                            <x-error message="purpose_of_coming" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشانی شوێنی مانەوە</legend>
                            <x-input name="address" id="address" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('address') ?? 'سلێمانی' }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">حاڵەت</legend>
                            <x-select name="status" id="status" type="date">
                                <option value="coming" @selected(old('status') === 'coming')>هاتن</option>
                                <option value="leaving" @selected(old('status') === 'leaving')>ڕۆشتن</option>
                            </x-select>
                            <x-error message="status" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">بڕی پارە</legend>
                            <x-select name="mount_of_money" id="mount_of_money">
                                <option value="{{ 5000 }}" @selected(old('mount_of_money') == 5000) selected>5,000</option>
                                <option value="{{ 10000 }}" @selected(old('mount_of_money') == 10000)>10,000</option>
                                <option value="free" @selected(old('mount_of_money') == 0)>بێبەرامبەر
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
                                value="{{ old('targeted_person') }}" />
                            <x-error message="targeted_person" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایلی ئەو کەسەی سەردانی دەکات</legend>
                            <x-input name="no_of_visitors" id="no_of_visitors" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                value="{{ old('no_of_visitors') }}" />
                            <x-error message="no_of_visitors" />
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="mt-20 flex justify-center">
                <button type="submit" class="flex items-center space-x-1 space-x-reverse">
                    <div
                        class="flex items-center space-x-3 space-x-reverse rounded-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                        <span>زیادکردن</span>
                    </div>
                </button>
            </div>
            <hr class="mt-4 border border-dashed border-slate-500">
        </form>
    </div>


    @push('scripts')
        <script src="{{ asset('js/sardanikar.js') }}"></script>
    @endpush

    @if (session('success'))
        @push('scripts')
            <script>
                window.open(`/print/invoice/` + {{ session('id') }}, '_blank',
                    'left=200, width=500, height=500, top=200, toolbar=0, resizable=0');
            </script>
        @endpush
    @endif
@endsection
