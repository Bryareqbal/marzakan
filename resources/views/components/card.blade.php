@props(['route' => 'dashboard', 'label' => '', 'model' => null])
<a href="{{ route($route) }}"
    class="rounded-xl border border-opacity-10 bg-white p-5 transition-all duration-200 hover:border-opacity-20 hover:drop-shadow-lg">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <p class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-200">
                {{ $slot }}
            </p>
            <ul class="ms-3 flex flex-col">
                @if ($model !== null)
                    <li class="block font-medium text-slate-900">
                        {{ number_format($model::count(), 0, '.', ',') }}
                    </li>
                @endif
                <li class="font-medium text-slate-900">{{ $label }}</li>
            </ul>
        </div>
        <span class="rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </span>
    </div>
</a>
