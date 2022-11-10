<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90']) }}>
    {{ $slot }}
</button>
