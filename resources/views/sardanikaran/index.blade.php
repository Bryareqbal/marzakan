@extends('layouts.Auth')

@section('title', 'سەردانیکەر')

@section('content')
    <div class="container mx-auto px-3">
        <div class="mt-10 flex w-full flex-col justify-between space-y-5 lg:flex-row lg:space-y-0">
            <h1 class="inline rounded-md bg-green-500 p-2 text-white shadow">کۆی گشتی پارە:

                <span>{{ number_format($totalMoney, 0, '.', ',') }}</span>
            </h1>
            <a href="{{ route('show-sardaniakan') }}"
                class="inline-block rounded-md bg-green-500 p-2 text-white shadow">ژمارەی
                سەردانیکەران:

                <span>{{ number_format($counter, 0, '.', ',') }}</span>
            </a>
        </div>
        <div class="mx-auto mt-6 max-w-7xl space-y-5">
            <div
                class="flex w-full flex-col items-start space-x-reverse divide-y-2 md:flex-row md:divide-x-2 md:divide-y-0 md:divide-x-reverse">


                <div class="flex basis-full flex-col space-y-5 self-start">
                    <form action="{{ route('sardanikaran') }}" method="get" enctype="multipart/form-data">
                        <div class="flex flex-col items-start">
                            <div>
                                <x-input placeholder="گەڕان...(ژمارەی پاسپۆرت)" name="search" class="min-w-[20rem]"
                                    value="{{ old('search') }}" />
                                <button class="rounded-md bg-green-500 px-3 py-2 text-white shadow">گەڕان</button>
                            </div>
                            <a href="{{ route('sardanikar') }}"
                                class="text-green-500 underline decoration-green-500">زیادکردنی سەردانیکەر</a>
                        </div>
                    </form>
                    @if ($sardanikar)
                        <div>
                            <div class="mx-auto w-[15rem]">
                                <label for="img">
                                    <img src="{{ Storage::url($sardanikar->img) }}"
                                        class="aspect-square w-full rounded object-cover object-center shadow"
                                        id="image" />
                                    <input type="file" onchange="uploadImage()" name="img" class="hidden"
                                        id="img" />
                                </label>
                                <x-error message="img" />
                            </div>
                            <div class="flex basis-full flex-col space-y-5">
                                <div id="manual_div" class="grid grid-cols-1 gap-4 p-5 lg:grid-cols-2">
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
                                            <x-select name="gender" id="gender" disabled>
                                                <option value="{{ 1 }}" @selected($sardanikar->gender === true)>نێر
                                                </option>
                                                <option value="{{ 0 }}" @selected($sardanikar->gender === false)>مێ
                                                </option>
                                            </x-select>
                                            <x-error message="gender" />
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col space-y-3">
                                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                            <legend class="px-2">نەتەوە</legend>
                                            <x-input disabled name="nation" id="nation" type="text"
                                                class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                                value="{{ $sardanikar->nation ?? 'IRAN' }}" />
                                            <x-error message="nation" />
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col space-y-3">
                                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                            <legend class="px-2">بەرواری بەسەرچوونی پاسپۆرت</legend>
                                            <x-input disabled name="passport_expire_date" id="passport_expire_date"
                                                type="date" class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                                value="{{ $sardanikar->passport_expire_date }}" />
                                            <x-error message="passport_expire_date" />
                                        </fieldset>
                                    </div>
                                    <div class="flex flex-col space-y-3">
                                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                                            <legend class="px-2">دەسەڵاتی دەرکردن</legend>
                                            <x-input disabled name="issuing_authority" id="issuing_authority"
                                                type="text" class="w-full rounded-lg border border-slate-300 py-2 pr-3"
                                                value="{{ $sardanikar->issuing_authority ?? 'IRAN' }}" />
                                            <x-error message="issuing_authority" />
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <form class="basis-full" action="{{ route('add-sardanikaran') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($sardanikar)
                        <input type="hidden" name="sardanikar_id" value="{{ $sardanikar->id }}" />
                    @endisset
                    <div class="grid grid-cols-1 gap-4 p-5 lg:grid-cols-2">

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
                                    <option value="{{ 5000 }}" @selected(old('mount_of_money') == 5000) selected>5,000
                                    </option>
                                    <option value="{{ 10000 }}" @selected(old('mount_of_money') == 10000)>10,000</option>
                                    <option value="free" @selected(!empty(old('mount_of_money')) && old('mount_of_money') == 'free')>بێبەرامبەر
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
                                    value="{{ old('no_of_visitors') ?? '07' }}" />
                                <x-error message="no_of_visitors" />
                            </fieldset>
                        </div>
                    </div>

                    <div class="mt-20 flex flex-col items-center">
                        <x-error message="sardanikar_id" />
                        <button type="submit" class="flex items-center space-x-1 space-x-reverse">
                            <div
                                class="flex items-center space-x-3 space-x-reverse rounded-md bg-gradient-to-br from-green-500 to-green-600 px-6 py-1 text-white">
                                <span>زیادکردن</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>

            <hr class="mt-4 border border-dashed border-slate-500">
        </div>
    </div>

    @if (session('success'))
        @push('scripts')
            <script>
                window.open(`/print/invoice/` + {{ session('id') }}, '_blank',
                    'left=200, width=500, height=500, top=200, toolbar=0, resizable=0');
            </script>
        @endpush
    @endif
@endsection
