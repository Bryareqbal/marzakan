@props(['label' => '', 'href' => null, 'route' => null])
<a href="{{ $href ?? route($route) }}" @class([
    'inline-block rounded-md shadow ring-1 ring-gray-300 p-5 text-center',
    $attributes['class'],
])>
    <span>{{ $label }}</span>
</a>
