<select {{ $attributes }} @class([
    'w-full rounded-lg border border-slate-300 pr-3 py-2 bg-white focus:ring-2 ring-green-500',
    $attributes['class'],
])>
    {{ $slot }}
</select>
