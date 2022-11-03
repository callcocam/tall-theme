<div x-init="Sortable.create($el, {
    animation: 200,
    easing: 'cubic-bezier(0, 0, 0.2, 1)',
    delay: 150,
    delayOnTouchOnly: true,
    draggable: '.draggable',
    handle: '.draggable-handler',
    store: {
        get: function(sortable) {
            var order = [];
            {{-- console.log(sortable.options.group.name); --}}
            return order;
        },
        set: function(sortable) {
            var order = sortable.toArray();
            $wire.groupUpdatedOrder(order.join('|'));
        }
    }
})">
    {{ $slot }}
</div>
