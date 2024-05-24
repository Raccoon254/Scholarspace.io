<button {{ $attributes->merge(['type' => 'submit', 'class' => 'custom-btn']) }}>
    {{ $slot }}
</button>
