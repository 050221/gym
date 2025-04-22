<div x-data="{ show: false }" class="relative w-full">
    <input 
        type="password"
        name="<?php echo e($name); ?>"
        id="<?php echo e($id); ?>"
        placeholder="<?php echo e($placeholder); ?>"
        class="w-full border-gray-200  dark:bg-gray-600 dark:text-white placeholder-gray-500 dark:placeholder-gray-300 focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm"
        :type="show ? 'text' : 'password'"
        <?php echo e($attributes); ?>

    />

    <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 flex items-center px-3">
        <span class="material-icons text-gray-500 dark:text-gray-200" x-show="!show">visibility</span>

        <span class="material-icons text-gray-500 dark:text-gray-200" x-show="show">visibility_off</span>
    </button>
</div>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views\components\input-password.blade.php ENDPATH**/ ?>