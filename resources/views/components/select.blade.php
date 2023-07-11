<select {{ $attributes }} @class([
    'w-full rounded-lg border border-slate-300 pr-3 py-2 bg-white',
])>
    {{ $slot }}
</select>
