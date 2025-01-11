@props(['active' => false])

<a
    {{ $attributes->merge([
        'class' => $active
            ? 'flex items-center p-2 text-gray-900  text-white bg-gray-600 group rounded-lg'
            : 'flex items-center p-2 text-gray-900 text-white hover:bg-gray-600 group rounded-lg',
    ]) }}>
    {{ $slot }}
</a>
