<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90']) }}>
    {{ $slot }}
</button>
