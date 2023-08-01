@extends('layouts.Auth')

@section('title', 'سەردانیکەران')
@section('content')
    <div class="container mx-auto mt-10 space-y-5 px-3">
        <h1 class="text-2xl">سەردانیکەران</h1>
        <div class="mx-auto w-full lg:w-[50rem]">
            <div class="w-full">
                <form method="get" action="{{ route('show-sardaniakan') }}" class="flex items-center">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor"
                            class="mr-3 h-10 w-10 rounded-br-md rounded-tr-md bg-green-600 p-1 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                    <x-input name="search" type="search" class="w-[20] pr-3" placeholder="گەڕان" />
                </form>
            </div>
            @if ($sardanikaran->isNotEmpty())
                <div class="">
                    <table class="mt-6 w-full">
                        <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                            <tr>
                                <th class="px-2 py-3 text-right font-medium">#</th>
                                <th class="px-1 py-3 text-right font-medium">ناو</th>
                                <th class="px-1 py-3 font-medium">حاڵەت</th>
                                <th class="px-1 py-3 font-medium">بڕی پارە</th>
                                <th class="px-1 py-3 font-medium">بەروار</th>
                                @canany(['user', 'sarparshtyar'])
                                    <th class="px-1 py-3 text-center font-medium">چالاکی</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sardanikaran as $key => $sardani)
                                <tr class="text-center odd:bg-slate-100">
                                    <td class="px-6 py-3 text-right">
                                        {{ $sardanikaran->firstItem() + $key }}
                                    </td>
                                    <td class="px-6 py-3 text-right capitalize">{{ $sardani->sardanikar->name }}</td>
                                    <td class="px-6 py-3 capitalize">
                                        {{ $sardani->status === 'coming' ? 'هاتن' : 'ڕۆشتن' }}</td>
                                    <td class="px-6 py-3 capitalize">
                                        {{ number_format($sardani->mount_of_money, 0, '.', ',') }}</td>
                                    <td class="px-6 py-3 capitalize">
                                        {{ $sardani->created_at->format('Y-m-d H:m:s') }}</td>
                                    @canany(['user', 'sarparshtyar'])
                                        <td class="flex justify-center px-6 py-3 capitalize">
                                            <button onclick="print({{ $sardani->id }})"
                                                class="rounded-md bg-gradient-to-br from-green-500 to-green-600 px-3 py-2 text-white shadow">چاپکردن</button>
                                            {{-- <a href="{{ route('edit-sardanikar') }}"
                                                class="inline-block rounded-md bg-gradient-to-br from-green-500 to-green-600 px-3 py-2 text-white shadow">گۆڕانکاری</a> --}}
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $sardanikaran->links() }}
                </div>
            @else
                <x-notFound />
            @endif
        </div>

        @push('scripts')
            <script>
                const print = (id) => {
                    window.open(`/print/invoice/${id}`, '_blank',
                        'left=200, width=500, height=500, top=200, toolbar=0, resizable=0');
                }
            </script>
        @endpush
    </div>
@endsection
