@section('title', 'ڕاپۆرت')

<div>
    <div class="container mx-auto px-5 pt-10">
        <section class="flex justify-center">
            <span class="flex items-center space-x-3 space-x-reverse rounded-lg bg-white px-2 py-2">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <span
                        class="flex h-12 w-12 items-center justify-center rounded-xl border border-white bg-emerald-100 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-7 w-7 text-emerald-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                    </span>
                    <h1 class="text-xl">ڕاپۆرت</h1>
                </div>
            </span>
        </section>
        <section class="mt-6 rounded-lg bg-white p-3">
            <div class="flex items-center space-x-4 space-x-reverse">
                <span class="h-3 w-3 rounded bg-green-600">
                </span>
                <h1 class="underline decoration-green-600 decoration-2 underline-offset-8">
                    بەشی ڕاپۆرت
                </h1>
            </div>
            <form class="mt-6 max-w-7xl">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">

                    <div class="flex flex-col space-y-3">
                        <fieldset class="rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">گەڕان</legend>
                            <x-input class="w-full" wire:model.live='filters.search' />
                        </fieldset>
                    </div>
                    <div class="col-start-1 flex flex-col space-y-3">
                        <fieldset
                            class="flex flex-col gap-3 rounded-lg border-2 border-green-500 p-2 md:flex-row md:items-center">
                            <legend class="px-2">بەراور</legend>
                            <label for="from"
                                class="flex items-center space-x-2 space-x-reverse md:flex-col md:items-start md:space-x-0 md:space-y-2 lg:flex-row lg:items-center lg:space-x-3 lg:space-x-reverse">
                                <span>لە</span>
                                <x-input class="w-full" type="date" wire:model.live='filters.from' />
                            </label>
                            <label for="to"
                                class="flex items-center space-x-2 space-x-reverse md:flex-col md:items-start md:space-x-0 md:space-y-2 lg:flex-row lg:items-center lg:space-x-3 lg:space-x-reverse">
                                <span>بۆ</span>
                                <x-input class="w-full" type="date" wire:model.live="filters.to" />
                            </label>
                        </fieldset>
                    </div>


                    <div class="flex flex-col space-y-3">
                        <fieldset class="flex flex-wrap gap-x-5 gap-y-2 rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی مەرز</legend>
                            @if (Gate::allows('superadmin'))
                                @foreach ($this->marzakan as $key => $marz)
                                    <label class="flex space-x-2 space-x-reverse">
                                        <input type="checkbox" wire:loading.attr="disabled"
                                            wire:model.live.debounce.150ms='filters.marzakan'
                                            class="h-5 w-5 accent-green-600" value="{{ $marz->id }}" />
                                        <span>{{ $marz->name }}</span>
                                    </label>
                                @endforeach

                                @if ($this->marzakan->isEmpty())
                                    <p>هیچ مەرزێک نەدۆزرایەوە</p>
                                @endif
                            @elseif (Gate::allows('sarparshtyar'))
                                <span class="px-3 py-2">{{ $this->marzakan->name }}</span>
                            @endif
                        </fieldset>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <fieldset class="flex flex-wrap gap-x-5 gap-y-2 rounded-lg border-2 border-green-500 p-2">
                            <legend class="px-2">ناوی سەرپەرشتیار </legend>
                            @if (Gate::allows('superadmin'))
                                @foreach ($this->sarparshtyarakan as $key => $sarparshtyar)
                                    <label class="flex space-x-2 space-x-reverse">
                                        <input type="checkbox" wire:loading.attr="disabled"
                                            class="h-5 w-5 accent-green-600" wire:model.live='filters.sarparshtyarakan'
                                            value="{{ $sarparshtyar->id }}" />
                                        <span>{{ $sarparshtyar->name }}</span>
                                    </label>
                                @endforeach
                                @if ($this->sarparshtyarakan->isEmpty())
                                    <p>هیچ سەرپەرشتیارێک نەدۆزرایەوە</p>
                                @endif
                            @elseif (Gate::allows('sarparshtyar'))
                                <span class="px-3 py-2">{{ Auth::user()->name }}</span>
                            @endif
                        </fieldset>
                    </div>


                    <div class="flex flex-col space-y-3">
                        <fieldset class="flex flex-wrap gap-x-5 gap-y-2 rounded-lg border-2 border-green-500 p-2">
                            @foreach ($this->karmandakan as $key => $karmand)
                                <label class="flex space-x-2 space-x-reverse">
                                    <input type="checkbox" wire:loading.attr="disabled" class="h-5 w-5 accent-green-600"
                                        wire:model.live='filters.karmandakan' value="{{ $karmand->id }}" />
                                    <span>{{ $karmand->name }}</span>
                                </label>
                            @endforeach
                            @if ($this->karmandakan->isEmpty())
                                <p>هیچ کارمەندێک نەدۆزرایەوە</p>
                            @endif
                            <legend class="px-2">ناوی کارمەند</legend>
                        </fieldset>
                    </div>
                </div>
                {{-- <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center space-x-1 space-x-reverse focus:outline-none">
                        <span
                            class="flex h-8 w-8 items-center justify-center rounded rounded-br-md rounded-tr-md border shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                            </svg>

                        </span>
                        <div
                            class="flex items-center space-x-3 space-x-reverse rounded-bl-md rounded-tl-md bg-gradient-to-br from-yellow-500 to-yellow-600 px-6 py-1 text-white">
                            <span>وەرگرتنی راپۆرت</span>
                        </div>
                    </button>
                </div> --}}
                <hr class="mt-4 max-w-4xl border border-dashed border-slate-500">
            </form>

        </section>

        <div class="flex flex-col space-y-5 md:flex-row md:space-x-3 md:space-y-0 md:space-x-reverse">
            <div class="border-opacity-15 w-full rounded-xl border p-5 shadow-xl md:w-auto">
                <div class="flex items-center justify-between">
                    <span>کۆی پارە
                        @if ($this->report->sum('mount_of_money'))
                            <span
                                class="font-medium">{{ number_format($this->report->sum('mount_of_money'), 0, '.', ',') }}
                                دینار</span>
                        @else
                            <span class="font-medium">{{ number_format(0, 0, '.', ',') }} دینار</span>
                        @endif
                    </span>
                </div>
            </div>
            <div class="border-opacity-15 w-full rounded-xl border p-5 shadow-xl hover:drop-shadow-xl md:w-auto">
                <div class="flex items-center justify-between">
                    <span>کۆی سەردانیکەر:
                        @if ($this->report->total() !== 0)
                            <span class="font-medium">{{ number_format($this->report->total(), 0, '.', ',') }}</span>
                        @else
                            <span class="font-medium">{{ number_format(0, 0, '.', ',') }}</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>

        @if ($this->report->isNotEmpty())
            <div class="w-full overflow-auto">
                <table class="mt-6 w-full">
                    <thead class="rounded-lg bg-gradient-to-br from-green-500 to-green-600 text-white">
                        <tr>
                            <th class="px-1 py-3 text-right font-medium">#</th>
                            <th class="px-1 py-3 text-right font-medium">ناو</th>
                            <th class="px-1 py-3 text-right font-medium">ناوی سەرپەرشتیار</th>
                            <th class="px-1 py-3 text-right font-medium">ناوی کارمەند</th>
                            <th class="px-1 py-3 text-center font-medium">ژمارەی پاسۆرت</th>
                            <th class="px-1 py-3 text-center font-medium">نەتەوە</th>
                            <th class="px-1 py-3 text-center font-medium">ژمارە تەلەفون</th>
                            <th class="px-1 py-3 text-center font-medium">بڕی پارە</th>
                            <th class="px-1 py-3 text-center font-medium">حاڵات</th>
                            <th class="px-1 py-3 text-center font-medium">بەرواری زیادکردن</th>
                            @canany(['superadmin'])
                                <th class="px-1 py-3 text-center font-medium">چالاکی</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->report as $key => $report)
                            <tr class="even:bg-slate-100 hover:cursor-pointer">
                                <td class="px-6 py-3 text-right">
                                    {{ $this->report->firstItem() + $key }}
                                </td>
                                <td class="px-6 py-3 text-right capitalize">{{ $report->sardanikar->name }}</td>
                                <td class="px-6 py-3 text-right capitalize">
                                    @if ($report->sarparshtyar !== null)
                                        {{ $report->sarparshtyar->name }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-right capitalize">
                                    {{ $report->karmand->name }}

                                </td>
                                <td class="px-6 py-3 text-center">{{ $report->sardanikar->passport_number }}</td>
                                <td class="px-6 py-3 text-center">{{ $report->sardanikar->nation }}</td>
                                <td class="px-6 py-3 text-center">{{ $report->sardanikar->phone }}</td>
                                <td class="px-6 py-3 text-center">
                                    {{ number_format($report->mount_of_money, 0, '.', ',') }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    @unless ($report->status === 'coming')
                                        <div class="flex items-center space-x-1 space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6 rotate-180 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>رۆشتن</span>
                                        </div>
                                    @else
                                        <div class="flex items-center space-x-1 space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-6 w-6 text-emerald-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>هاتن</span>
                                        </div>
                                    @endunless
                                </td>
                                <td class="px-6 py-3 text-center font-sans">
                                    {{ $report->created_at->format('Y-m-d H:i:s A') }}</td>
                                @canany(['superadmin'])
                                    <td class="px-6 py-3 text-center font-sans">
                                        <a href="{{ route('edit-sardanikar', $report->id) }}" title="گۆرانکاری"
                                            class="flex h-10 w-10 items-center justify-center rounded border-2 border-blue-200 text-xl hover:border-blue-300 focus:ring-1 focus:ring-blue-500 focus:ring-offset-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-blue-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>

                                        </a>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="mt-2 flex justify-center">
        {{ $this->report->onEachSide(0)->links() }}
    </div>
</div>
