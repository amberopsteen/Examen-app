<button {{ $attributes->merge(['class' => 'mr-3 text-sm bg-red-500 hover:bg-red-900 text-white py-2 px-2 rounded-lg focus:outline-none focus:shadow-outline']) }}>
    {{ $slot }}
</button>
