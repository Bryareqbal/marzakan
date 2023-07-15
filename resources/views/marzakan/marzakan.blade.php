@extends('layouts.Auth')
@section('title', 'مەرزەکان')

@section('content')
    <div class="container mx-auto pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white py-2 px-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-7 w-7 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                        </svg>
                    </span>
                    <h1 class="text-xl">مەرزەکان</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    زیادکردنی مەرز
                </h1>
            </div>
            <form method="POST" action="{{ route('addNewMarzakan') }}" class="mt-6 max-w-6xl">
                @csrf
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی مەرز </legend>
                            <x-input name="name" id="name" type="text" class="w-full"
                                value="{{ old('name') }}" />
                            <x-error message="name" />
                        </fieldset>

                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناونیشان</legend>
                            <x-input name="address" id="address" type="text" class="w-full"
                                value="{{ old('address') }}" />
                            <x-error message="address" />
                        </fieldset>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
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

            <div class="mt-6 max-w-6xl">
                <form action="{{ route('marzakan') }}" method="GET"
                    class="flex flex-col space-y-5 md:flex-row md:space-y-0">
                    <div class="flex items-center">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                        <x-input name="name" value="{{ old('name') }}" type="search" class="w-full"
                            placeholder="ناوی مەرز" />
                    </div>
                    <div class="flex items-center">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                        <x-input name="address" type="search" class="w-full" placeholder="ناونیشان" />
                    </div>
                </form>
        </section>

        <div class="w-full overflow-auto">
            @if ($marzakan->isNotEmpty())
                <table class="mt-6 w-full min-w-max">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="px-3 py-2 text-right font-medium">#</th>
                            <th class="px-3 py-2 text-center font-medium">ناوی مەرز</th>
                            <th class="px-3 py-2 text-center font-medium">ناونیشان</th>
                            <th class="px-3 py-2 text-center font-medium">چالاکی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marzakan as $key => $marz)
                            <tr class="even:bg-slate-100 hover:cursor-pointer">
                                <td class="px-3 py-2 text-right font-medium">
                                    {{ $key + 1 }}</td>
                                <td class="px-3 py-2 text-center font-medium">
                                    {{ $marz->name }}</td>
                                <td class="px-3 py-2 text-center font-medium uppercase">
                                    {{ $marz->address }}</td>
                                <td class="flex justify-center px-3 py-2 text-left font-medium uppercase">
                                    <a href="{{ route('editMarzakan', $marz->id) }}">
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
            @endif
        </div>
    </div>
    <div class="mt-2 flex justify-center">
        {{ $marzakan->links() }}

    </div>
    </div>
@endsection
