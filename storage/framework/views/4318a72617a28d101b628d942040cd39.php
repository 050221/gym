<div class="mt-16 mb-3 mx-4">
    <div>
        <h1 class="text-4xl font-bold text-gray-400">Historial suscripciones</h1>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2 mt-4">
            <?php if (isset($component)) { $__componentOriginal899862596e9f1210da7f7a3787460d5a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal899862596e9f1210da7f7a3787460d5a = $attributes; } ?>
<?php $component = App\View\Components\Forms\SearchBar::resolve(['placeholder' => 'Buscar suscripciones...'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.search-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Forms\SearchBar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live.debounce.250ms' => 'search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal899862596e9f1210da7f7a3787460d5a)): ?>
<?php $attributes = $__attributesOriginal899862596e9f1210da7f7a3787460d5a; ?>
<?php unset($__attributesOriginal899862596e9f1210da7f7a3787460d5a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal899862596e9f1210da7f7a3787460d5a)): ?>
<?php $component = $__componentOriginal899862596e9f1210da7f7a3787460d5a; ?>
<?php unset($__componentOriginal899862596e9f1210da7f7a3787460d5a); ?>
<?php endif; ?>
        </div>
        <div class="flex justify-end w-full md:w-6/12 mt-3 lg:mt-0 ">
            <div class="w-[80px]">
                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['name' => 'numberRows','options' => ['10' => '10', '25' => '25', '50' => '50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Forms\Select::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model.live' => 'numberRows']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $attributes = $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__attributesOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86)): ?>
<?php $component = $__componentOriginal67cd5dc9866c6185ad92d933c387fa86; ?>
<?php unset($__componentOriginal67cd5dc9866c6185ad92d933c387fa86); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    <div class="w-full overflow-x-auto rounded-sm mt-10">
        <table class="w-full text-md text-left">
            <thead class="text-gray-700 bg-gray-200">
                <tr class="border-b border-gray-500 border-opacity-50">
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('id')">
                        #
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'id'): ?>
                            <i
                                class="material-icons text-sm "><?php echo e($sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward'); ?></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th class="px-4 py-2">Cliente</th>
                    <th class="px-4 py-2 ">
                        Membresía
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('estado_anterior')">
                        Estado anterior
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'estado_anterior'): ?>
                            <i
                                class="material-icons text-sm"><?php echo e($sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward'); ?></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_inicio')">
                        Fecha de inicio
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'fecha_inicio'): ?>
                            <i
                                class="material-icons text-sm"><?php echo e($sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward'); ?></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('fecha_fin')">
                        Fecha de finalización
                        <!--[if BLOCK]><![endif]--><?php if($sortField === 'fecha_fin'): ?>
                            <i
                                class="material-icons text-sm"><?php echo e($sortDirection === 'asc' ? 'arrow_upward' : 'arrow_downward'); ?></i>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </th>
                    <th class="px-4 py-2">
                        Fecha de creación
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <!--[if BLOCK]><![endif]--><?php if($historialSuscripciones->isEmpty()): ?>
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $historialSuscripciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $historialSuscripcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">
                                <?php echo e($key + 1 + $historialSuscripciones->perPage() * ($historialSuscripciones->currentPage() - 1)); ?>

                            </th>
                            <td class="px-4 py-2"><?php echo e($historialSuscripcion->user->full_name); ?></td>
                            <td class="px-4 py-2"><?php echo e($historialSuscripcion->membresia->nombre); ?></td>
                            <td class="px-4 py-2">
                                <?php if (isset($component)) { $__componentOriginale2d8c09656aa412aa719621221c85df9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale2d8c09656aa412aa719621221c85df9 = $attributes; } ?>
<?php $component = App\View\Components\Forms\StatusButton::resolve(['status' => $historialSuscripcion->estado_anterior] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('forms.status-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Forms\StatusButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale2d8c09656aa412aa719621221c85df9)): ?>
<?php $attributes = $__attributesOriginale2d8c09656aa412aa719621221c85df9; ?>
<?php unset($__attributesOriginale2d8c09656aa412aa719621221c85df9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale2d8c09656aa412aa719621221c85df9)): ?>
<?php $component = $__componentOriginale2d8c09656aa412aa719621221c85df9; ?>
<?php unset($__componentOriginale2d8c09656aa412aa719621221c85df9); ?>
<?php endif; ?>

                            </td>
                            <td class="px-4 py-2">
                                <?php echo e(\Carbon\Carbon::parse($historialSuscripcion->fecha_inicio)->isoFormat('DD-MMMM-YYYY')); ?>

                            </td>
                            <td class="px-4 py-2">
                                <?php echo e(\Carbon\Carbon::parse($historialSuscripcion->fecha_fin)->isoFormat('DD-MMMM-YYYY')); ?>

                            </td>
                            <td class="px-4 py-2">
                                <?php echo e($historialSuscripcion->created_at->isoFormat(' DD-MMMM-YYYY / hh:mm:ss A')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        <?php echo e($historialSuscripciones->links()); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/livewire/admin/suscripciones/tabla-historial-suscripciones-component.blade.php ENDPATH**/ ?>