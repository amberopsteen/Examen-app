@props(['value' => '', 'type' => 'text', 'required' => false])

<input {{ $attributes->merge(['class' => 'rounded-lg px-8 py-1.5 border border-gray-300', 'required' => $required, 'type' => $type]) }} value="{{ $value }}">
