@extends('layouts.Auth')

@section('title', 'سەردانیکەر')
@section('content')
    <div class="container mx-auto px-5 pt-10">
        <section class="flex flex-col justify-center">
            <h1 class="flex items-center justify-center space-x-3 space-x-reverse rounded-md bg-white px-3 py-2 text-xl">
                <span
                    class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                    <svg fill="#10b981" class="h-7 w-7" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path
                                        d="M186.395,78.124c-19.276,0-34.902,15.627-34.902,34.902c0,19.383,15.762,34.902,34.902,34.902 c19.238,0,34.901-15.594,34.901-34.902C221.295,93.751,205.67,78.124,186.395,78.124z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M165.387,409.151l-9.378-60.634h-38.116l10.267,66.391c1.593,10.299,11.235,17.325,21.491,15.735 C159.932,429.052,166.976,419.431,165.387,409.151z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M213.288,348.518l-9.378,60.634c-1.589,10.278,5.455,19.901,15.735,21.491c10.258,1.589,19.899-5.437,21.491-15.735 l10.267-66.391H213.288z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M288.488,297.699H128.757c0.905-1.437,1.437-3.133,1.437-4.958c0-3.187-1.602-5.997-4.042-7.679l64.683-0.091 c-1.445-1.169-2.89-4.014-3.595-5.612c-6.605-14.996,0.197-32.507,15.192-39.113c35.313-15.554,27.804-12.246,32.535-14.331 l-3.265-25.989c-0.077-0.611,0.296-1.189,0.884-1.371c0.588-0.182,1.223,0.083,1.505,0.631l17.276,33.524l-43.762,19.277 c-8.511,3.749-12.372,13.689-8.622,22.2c3.749,8.512,13.689,12.371,22.2,8.622l58.943-25.964 c8.306-3.659,12.217-13.241,8.846-21.668c-4.477-11.165-14.925-34.953-24.419-54.484c-6.393-13.146-19.972-21.642-34.595-21.642 c-7.467,0-81.701,0-81.701,0c-8.189,0-16.047,2.666-22.504,7.319h0.001h14.748c11.042,0,19.995,8.952,19.995,19.995v65.941 c0,10.65-8.376,19.356-18.883,19.938c-1.389,0.078,1.495,0.057-16.329,0.057l-2.252,11.379c-0.694-0.165-1.414-0.262-2.159-0.262 H99.237v-22.307h41.264c4.864,0,8.806-3.943,8.806-8.806v-65.941c0-4.864-3.943-8.806-8.806-8.806H27.586 c-4.864,0-8.806,3.943-8.806,8.806v65.941c0,4.864,3.943,8.806,8.806,8.806H68.85v22.307H47.216c-5.118,0-9.323,4.155-9.323,9.323 c0,1.824,0.532,3.52,1.438,4.958H19.859c-10.658,0-19.729,8.401-19.858,19.059c-0.122,10.227,7.716,18.635,17.704,19.452 c0,2.98,0,123.057,0,121.943c0,7.7,6.024,14.306,13.723,14.446c7.844,0.143,14.247-6.172,14.247-13.983 c0-13.152,0-109.246,0-122.326h217.058c0,4.023,0,123.032,0,121.863c0,7.7,6.024,14.306,13.723,14.446 c7.844,0.144,14.247-6.172,14.247-13.983c0-4.558,0-117.009,0-122.409c9.967-0.849,17.776-9.258,17.64-19.477 C308.201,306.083,299.136,297.699,288.488,297.699z M84.043,232.154c-7.08,0-12.819-5.739-12.819-12.819 c0-7.08,5.739-12.82,12.819-12.82c7.08,0,12.82,5.74,12.82,12.82C96.863,226.415,91.123,232.154,84.043,232.154z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <circle cx="417.108" cy="74.864" r="35.466"></circle>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M511.393,446.958l-22.128-89.671v-78.52l1.241-0.102l-10.91-132.722c-1.174-14.287-13.709-24.916-27.994-23.742 l-46.131,3.792c-14.287,1.174-24.916,13.708-23.742,27.994l1.919,23.338l7.26-0.924l23.224-17.699l-23.181,32.587l-22.346,2.844 c-1.236-4.483-5.332-7.78-10.208-7.78h-36.695h-23.951c-5.854,0-10.599,4.746-10.599,10.599c0,5.854,4.745,10.599,10.599,10.599 c7.671,0,13.712,0,21.173,0c-1.727,3.101-2.531,6.751-2.048,10.542c1.201,9.437,9.824,16.125,19.274,14.92l66.646-8.484 c4.774-0.608,9.078-3.184,11.868-7.107l27.558-38.741l-15.518,47.304c-2.242,6.835-8.174,11.426-14.861,12.289 c-9.008,1.142-4.038,0.51-22.944,2.917l3.457,42.048l-29.098,71.895c-1.731,4.278-1.982,9.011-0.713,13.448l25.462,89.018 c2.598,9.081,10.878,15.001,19.875,15.001c1.882,0,3.798-0.258,5.698-0.802c10.982-3.142,17.339-14.592,14.199-25.573 l-23.504-82.171l32.782-80.995l10.846-0.892v77.635c0,1.669,0.202,3.334,0.602,4.955l22.73,92.112 c2.325,9.426,10.772,15.733,20.064,15.733c1.641,0,3.308-0.197,4.972-0.608C507.358,469.256,514.13,458.048,511.393,446.958z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M358.397,152.448h-60.645c-5.854,0-10.599,4.746-10.599,10.599c0,5.854,4.745,10.599,10.599,10.599h60.645 c5.854,0,10.599-4.746,10.599-10.599C368.996,157.194,364.251,152.448,358.397,152.448z">
                                    </path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M358.397,118.541h-60.645c-5.854,0-10.599,4.746-10.599,10.599c0,5.853,4.745,10.599,10.599,10.599h60.645 c5.854,0,10.599-4.746,10.599-10.599C368.996,123.287,364.251,118.541,358.397,118.541z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
                <span>سەرپەرشتیارەکان</span>
            </h1>

            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    زیادکردنی سەرپەرشتیار
                </h1>
            </div>
            <form class="mt-6 max-w-6xl" action="{{ route('add-sarparshtyar') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەرشتیار </legend>
                            <x-input name="name" id="name" type="text" class="w-full"
                                value="{{ old('name') }}" />
                            <x-error message="name" />
                        </fieldset>

                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ژ.مۆبایل</legend>
                            <x-input name="phone" id="phone" type="text"
                                class="w-full rounded-lg border border-slate-300 py-2 pr-3" maxlength="11"
                                value="{{ old('phone') }}" />
                            <x-error message="phone" />
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">مەرز</legend>
                            <x-select name="marz" id="marz">
                                <option value="">مەرز</option>
                                @foreach ($marzakan as $marz)
                                    <option @selected(old('marz') == $marz->id) value="{{ $marz->id }}">{{ $marz->name }}
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
                            <span>زیادکردن</span>
                        </div>
                    </button>
                </div>
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>
        </section>

        <form action="{{ route('sarparshtyarakan') }}" method="GET" class="mt-10 flex items-center">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>
            <x-input name="search" value="{{ Request::get('search') }}" type="search"
                class="w-full pr-3 md:w-1/2 lg:w-3/12" placeholder="گەڕان" />
        </form>
        @if ($sarparshtyarakan->isNotEmpty())
            <div class="overflow-auto">
                <table class="mt-6 w-full min-w-max">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="px-3 py-2 text-right font-medium">#</th>
                            <th class="px-3 py-2 text-center font-medium">ناو</th>
                            <th class="px-3 py-2 text-center font-medium">ژ.مۆبایل</th>
                            <th class="px-3 py-2 text-center font-medium">ناوی مەرز</th>
                            <th class="px-3 py-2 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sarparshtyarakan as $key => $sarparshtyar)
                            <tr class="even:bg-green-100 hover:cursor-pointer hover:bg-green-200">
                                <td class="px-3 py-2 text-right font-medium">
                                    {{ $sarparshtyarakan->firstItem() + $key }}</td>
                                <td class="px-3 py-2 text-center font-medium">
                                    {{ $sarparshtyar->name }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $sarparshtyar->phone }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $sarparshtyar->marz->name }}</td>
                                <td class="flex justify-center px-3 py-2 text-left font-medium uppercase">
                                    <a href="{{ route('edit-sarparshtyar', $sarparshtyar->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
