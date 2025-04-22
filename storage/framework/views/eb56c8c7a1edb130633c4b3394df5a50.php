<div class="mt-16 mb-3 mx-4">
    <div class="flex flex-wrap ">
        <div class="w-full md:w-1/2">
            <h1 class="text-4xl font-bold text-gray-400">Membresias</h1>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex flex-row-reverse ">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('membresia.create-modal-membresias-component');

$__html = app('livewire')->mount($__name, $__params, 'lw-3218895075-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
    <hr class="border-2 my-3 border-gray-500">
    <div class="flex flex-wrap mt-4 ">
        <div class="w-full md:w-6/12 mt-3 ">
            <?php if (isset($component)) { $__componentOriginal899862596e9f1210da7f7a3787460d5a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal899862596e9f1210da7f7a3787460d5a = $attributes; } ?>
<?php $component = App\View\Components\Forms\SearchBar::resolve(['placeholder' => 'Buscar ...'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
        <div class="flex justify-end gap-2 w-full md:w-6/12 mt-3 lg:mt-0">
            <div class="w-[80px]">
                <?php if (isset($component)) { $__componentOriginal67cd5dc9866c6185ad92d933c387fa86 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal67cd5dc9866c6185ad92d933c387fa86 = $attributes; } ?>
<?php $component = App\View\Components\Forms\Select::resolve(['name' => 'numberRows','classes' => 'w-[80px]','options' => ['10' => '10', '25' => '25', '50' => '50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                    <th class="px-4 py-2">Nombre de la Membresía</th>
                    <th class="px-4 py-2">Duracion</th>
                    <th class="px-4 py-2">Precio</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <!--[if BLOCK]><![endif]--><?php if($membresias->isEmpty()): ?>
                    <tr>
                        <td colspan="12" class="text-center py-4">
                            <div class="flex justify-center items-center text-gray-500 text-lg">
                                <i class="material-icons text-gray-400 mr-2">info</i> No hay resultados
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $membresias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membresia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <th class="px-4 py-2">
                                <?php echo e($loop->iteration + $membresias->perPage() * ($membresias->currentPage() - 1)); ?>

                            </th>
                            <td class="px-4 py-2"><?php echo e($membresia->nombre); ?></td>
                            <td class="px-4 py-2"><?php echo e($membresia->duracion_meses); ?> Meses</td>
                            <td class="px-4 py-2">$<?php echo e($membresia->precio); ?></td>
                            <td class="px-4 py-2">
                                <form id="deleteForm" action="<?php echo e(url('/membresias/' . $membresia->id)); ?>"
                                    method="post">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>

                                    <a href="#"
                                        wire:click="$dispatch('editMembresia', { id: <?php echo e($membresia->id); ?> })"
                                        data-bs-toggle="modal" title="Editar Membresía">
                                        <i class="material-icons text-yellow-500 ">edit</i>
                                    </a>
                                    <button type="button" onclick="confirmDelete(this)" title="Eliminar Membresía">
                                        <i class="material-icons text-red-500 ">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('membresia.edit-modal-membresia');

$__html = app('livewire')->mount($__name, $__params, 'lw-3218895075-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
    <div class="mt-3">
        <?php echo e($membresias->links()); ?>

    </div>

</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/livewire/admin/membresias/tabla-membresias-component.blade.php ENDPATH**/ ?>