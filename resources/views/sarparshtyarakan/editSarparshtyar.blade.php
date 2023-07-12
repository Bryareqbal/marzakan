@extends('layouts.Auth')

@section('content')
    <div class="container mx-auto mt-10">
        <section class="flex flex-col justify-center">
            <h1 class="flex items-center justify-center space-x-3 space-x-reverse rounded-md bg-white px-3 py-2 text-xl">
                <span
                    class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                    <x-sarparshtyar-logo />

                </span>
                <span>سەرپەرشتیارەکان</span>
            </h1>

            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    گۆرینی سەرپەرشتیار
                </h1>
            </div>
            <form class="mt-6 max-w-6xl" method="POST"
                action="{{ route('update-sarparshtyar', ['id' => $sarparshtyar->id]) }}">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەرشتیار </legend>
                            <x-select name="user_id" id="marz">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($users as $user)
                                    <option @selected($sarparshtyar->user_id == $user->id) value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach

                            </x-select>
                            <x-error message="user_id" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایل</legend>
                            <x-input name="phone" id="phone" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3" maxlength="11"
                                value="{{ $sarparshtyar->phone }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">مەرز</legend>
                            <x-select name="marz" id="marz">
                                <option value="">هەڵبژێرە</option>
                                @foreach ($marzakan as $marz)
                                    <option @selected($sarparshtyar->marz->id == $marz->id) value="{{ $marz->id }}">{{ $marz->name }}
                                    </option>
                                @endforeach

                            </x-select>
                            <x-error message="marz" />
                        </fieldset>
                    </div>

                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-green-500 to-green-600 py-1 px-6 text-white">
                            <span>نوێکردنەوە</span>
                        </div>
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection
