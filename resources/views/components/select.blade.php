<select
    {{ $attributes->merge(['class' => 'w-full rounded-lg border border-slate-300 pr-3 py-2 bg-white focus:ring-2 ring-green-500 disabled:bg-gray-100']) }}>

    {{ $slot }}
</select>
