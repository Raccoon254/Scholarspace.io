@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full p-2 border border-gray-300 rounded-lg rounded-md']) !!}>
