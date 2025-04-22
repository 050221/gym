<div>
    <textarea id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" 
        <?php echo e($attributes->merge(['class' => "w-full p-2 border-gray-200  dark:bg-gray-600 dark:text-white focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm$classes"])); ?>

        rows="<?php echo e($rows); ?>" placeholder="<?php echo e($placeholder); ?>" <?php echo e($attributes); ?>><?php echo e(old($name)); ?></textarea>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views\components\forms\text-area.blade.php ENDPATH**/ ?>