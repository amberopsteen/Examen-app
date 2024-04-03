@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'mr-3 text-sm bg-blue-400 h-9 hover:bg-blue-400 py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</a>
