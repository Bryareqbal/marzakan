@props(['message'])

@error($message)
    <small @class(['px-1 mt-2 text-red-500'])>{{ $message }}</small>
@enderror
