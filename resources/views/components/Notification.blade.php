@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)">
        <div x-show="show" x-transition:leave="transition ease-in duration-300 scale-100"
            x-transition:leave-start="opacity-100 scale-150" x-transition:leave-end="opacity-0 scale-50"
            class="fixed px-4 py-2 rounded-xl bg-emerald-500 text-white bottom-6 right-3 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 ml-2 text-white">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    </div>
@endif
