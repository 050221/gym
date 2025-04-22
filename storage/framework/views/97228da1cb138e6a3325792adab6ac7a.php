<div>
    <?php if($label): ?>
        <label for="<?php echo e($name); ?>" class="block text-sm font-medium text-gray-700"><?php echo e($label); ?></label>
    <?php endif; ?>
    <select id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" <?php echo e($attributes); ?>

    <?php echo e($attributes->merge(['class' => "block w-full px-3 py-2 border-gray-200 dark:bg-gray-600 dark:text-white focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm " . ($classes ?? '')])); ?>


        <?php if($defaultOption): ?>
            <option value=""><?php echo e($defaultOption); ?></option>
        <?php endif; ?>
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>" <?php echo e($value == $selected ? 'selected' : ''); ?>>
                <?php echo e($option); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views\components\forms\select.blade.php ENDPATH**/ ?>