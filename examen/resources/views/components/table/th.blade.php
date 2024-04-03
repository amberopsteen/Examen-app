@props(['classes' => ''])

<th {{ $attributes->merge(['class' => "border border-solid border-slate-600 p-2 bg-white $classes"]) }}>
    {{ $slot }}
</th>
