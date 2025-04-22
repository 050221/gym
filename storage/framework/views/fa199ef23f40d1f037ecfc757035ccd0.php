<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $color = match ($status) {
        //suscripciones
        'Activa' => ' bg-green-300 text-green-700 font-semibold ', 
        'Inactiva' => 'bg-gray-300 text-gray-700 font-semibold ',
        'Pausada' => 'bg-yellow-300 text-yellow-700 font-semibold ',
        'Cancelada' => 'bg-red-400 text-red-700 font-semibold ',
        'Expirada' => 'bg-purple-300 text-purple-700 font-semibold ',
        'Modificada' => 'bg-yellow-300 text-yellow-700 font-semibold ',
        //clientes
        'Activo' => ' bg-green-300 text-green-700 font-semibold ', 
        'Inactivo' => 'bg-red-400 text-red-700 font-semibold ',
        default => 'bg-green-300 text-green-700 font-semibold '
    };
?>

<button class="<?php echo e($color); ?>   px-2.5 py-1 rounded-2xl">
    <?php echo e($status); ?>

</button>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/components/forms/status-button.blade.php ENDPATH**/ ?>