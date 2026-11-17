<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-solid theme-primary']) }}>
    {{ $slot }}
</button>