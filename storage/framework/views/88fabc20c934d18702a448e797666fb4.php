<?php
    $statusClasses = [
        'Activa' => 'bg-green-500',
        'Inactiva' => 'bg-gray-400',
        'Pausada' => 'bg-yellow-600',
        'Cancelada' => 'bg-red-500',
        'Expirada' => 'bg-purple-500',
    ];
?>

<div class="flex items-center">
    
    <span class="ml-2 font-semibold text-sm px-2 py-1 rounded 
        <?php echo e($statusClasses[$status] ?? 'bg-gray-300'); ?> text-white">
        <?php echo e($status); ?>

    </span>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views\components\forms\switch-status.blade.php ENDPATH**/ ?>