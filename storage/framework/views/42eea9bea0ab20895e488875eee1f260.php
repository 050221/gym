<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('assets/icons/icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="96x96" href="<?php echo e(asset('assets/icons/icon-96x96.png')); ?>">
    <link rel="apple-touch-icon" sizes="128x128" href="<?php echo e(asset('assets/icons/icon-128x128.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('assets/icons/icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="192x192" href="<?php echo e(asset('assets/icons/icon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="384x384" href="<?php echo e(asset('assets/icons/icon-384x384.png')); ?>">
    <link rel="apple-touch-icon" sizes="512x512" href="<?php echo e(asset('assets/icons/icon-512x512.png')); ?>">
    <link rel="icon" type="image/png" sizes="72x72" href="<?php echo e(asset('assets/icons/icon-72x72.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('assets/icons/icon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="128x128" href="<?php echo e(asset('assets/icons/icon-128x128.png')); ?>">
    <link rel="icon" type="image/png" sizes="144x144" href="<?php echo e(asset('assets/icons/icon-144x144.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('assets/icons/icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="384x384" href="<?php echo e(asset('assets/icons/icon-384x384.png')); ?>">
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo e(asset('assets/icons/icon-512x512.png')); ?>">

    <title><?php echo e(config('app.name', 'Gym')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        <?php echo e($slot); ?>

    </div>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views/layouts/guest.blade.php ENDPATH**/ ?>