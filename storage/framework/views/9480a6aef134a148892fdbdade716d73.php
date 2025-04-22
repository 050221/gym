<div>
    <div class="w-full space-y-4">
        <!--[if BLOCK]><![endif]--><?php if($suscripciones->count() > 0): ?>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $suscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $suscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="rounded-lg shadow-md border border-gray-300 overflow-hidden bg-white hover:shadow-lg transition-shadow">
                    
                    <button wire:click="togglePanel(<?php echo e($index); ?>)"
                        class="w-full flex justify-between items-center p-2 text-left font-medium transition-all duration-300 
                    <?php echo e($openPanel === $index ? 'bg-orange-50 text-orange-700' : 'hover:bg-gray-100'); ?>"
                        aria-expanded="<?php echo e($openPanel === $index ? 'true' : 'false'); ?>"
                        aria-controls="panel-<?php echo e($index); ?>">
                        <p class="text-base font-semibold">
                            <?php echo e($suscripcion->user->fullname ?? 'Miembro desconocido'); ?>

                        </p>
                        <div class="flex items-center">
                            <!--[if BLOCK]><![endif]--><?php if($openPanel === $index): ?>
                                
                                <i class="material-icons text-orange-600 text-4xl">keyboard_arrow_up</i>
                            <?php else: ?>
                                
                                <i class="material-icons text-orange-600 text-4xl">keyboard_arrow_down</i>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </button>

                    
                    <!--[if BLOCK]><![endif]--><?php if($openPanel === $index): ?>
                        <div id="panel-<?php echo e($index); ?>"
                            class="p-6 bg-gray-50 text-gray-700 transition-all duration-300 ease-in-out">
                            <ul class="space-y-3">
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Membresia:</span>
                                    <span><?php echo e($suscripcion->membresia->nombre ?? 'No especificado'); ?></span>
                                </li>
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Fecha de Vencimiento:</span>
                                    <span><?php echo e(\Carbon\Carbon::parse($suscripcion->fecha_fin)->isoFormat('DD-MMMM-YYYY')); ?></span>
                                </li>
                                <li class="flex items-center">
                                    <span class="font-semibold w-32">Estado:</span>
                                    <span><?php echo e($suscripcion->status); ?></span>
                                </li>
                                
                            </ul>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        <?php else: ?>
            <div class="text-center text-gray-500 bg-gray-100 p-6 rounded-lg">
                <p class="text-lg font-medium">No hay suscripciones próximas a vencer</p>
                <p class="text-sm">Verifica más tarde para ver actualizaciones.</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="mt-4">
        <?php echo e($suscripciones->links()); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/livewire/components/suscripciones-proximas-vencer.blade.php ENDPATH**/ ?>