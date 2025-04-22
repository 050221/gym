<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Gym')); ?></title>

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

    <link href="css/styles.css" rel="stylesheet">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- chart js-->


    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="font-sans antialiased">
    <?php if (isset($component)) { $__componentOriginalff9615640ecc9fe720b9f7641382872b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff9615640ecc9fe720b9f7641382872b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $attributes = $__attributesOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__attributesOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $component = $__componentOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__componentOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-2335473814-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
            <header class="bg-white dark:bg-gray-700 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <?php if(session('success')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "<?php echo e(session('success')); ?>",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php endif; ?>

    <?php if(session('danger')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "<?php echo e(session('danger')); ?>",
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                icon: "error",
                title: "<?php echo e(session('error')); ?>",
                customClass: {
                    confirmButton: 'bg-orange-500 text-white font-semibold py-2 px-6 rounded hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 transition-all duration-200 ease-in-out cursor-pointer border-2 border-orange-300 shadow-md hover:shadow-lg active:scale-95 mr-2',
                },
                buttonsStyling: false,

            });
        </script>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit(); // Envía el formulario correcto
                }
            });
        }
    </script>

    <script>
        function confirmDeleteSuscripcion(button) {
            Swal.fire({
                title: "¿Estás seguro de eliminar esta suscripción?",
                text: "Esta acción eliminará permanentemente la suscripción. No podrás recuperarla.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit(); // Envía el formulario correcto
                }
            });
        }
    </script>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\gymUpdate\resources\views\layouts\app.blade.php ENDPATH**/ ?>