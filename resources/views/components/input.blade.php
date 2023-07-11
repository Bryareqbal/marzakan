<input type="{{ $attributes['type'] }}" @class([
    'border border-slate-200 px-3 focus:outline-none rounded-lg shadow py-2 focus:ring-2 ring-green-500',
    $attributes['class'],
]) {{ $attributes }} />
