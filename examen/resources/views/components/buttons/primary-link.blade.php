@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'mr-3 text-sm bg-blue-300 hover:bg-blue-400 py-1 px-2 rounded focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</a>
