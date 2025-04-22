<div class="relative">
    <input 
        type="text" 
        <?php if(isset($name)): ?> name="<?php echo e($name); ?>" <?php endif; ?>
        placeholder="<?php echo e($placeholder); ?>"
        <?php echo e($attributes->merge(['class' => "p-2 w-full text-base rounded-md border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 shadow-md hover:bg-gray-200 dark:hover:bg-gray-700 focus:ring-offset-2 focus:ring-2 focus:ring-orange-500 focus:outline-none transition-all duration-300 " . ($classes ?? '')])); ?> 
    />
    <i class="material-icons absolute right-3 top-2.5 w-5 h-5 text-gray-400 dark:text-gray-500 pointer-events-none">search</i>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/components/forms/search-bar.blade.php ENDPATH**/ ?>