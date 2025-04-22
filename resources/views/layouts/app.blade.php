<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gym') }}</title>

    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icons/icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="96x96" href="{{ asset('assets/icons/icon-96x96.png') }}">
    <link rel="apple-touch-icon" sizes="128x128" href="{{ asset('assets/icons/icon-128x128.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icons/icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('assets/icons/icon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="384x384" href="{{ asset('assets/icons/icon-384x384.png') }}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{ asset('assets/icons/icon-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="72x72" href="{{ asset('assets/icons/icon-72x72.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/icons/icon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('assets/icons/icon-128x128.png') }}">
    <link rel="icon" type="image/png" sizes="144x144" href="{{ asset('assets/icons/icon-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/icons/icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="384x384" href="{{ asset('assets/icons/icon-384x384.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/icons/icon-512x512.png') }}">

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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-700 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if (session('danger'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{{ session('danger') }}",
                showConfirmButton: false,
                timer: 1800
            });
        </script>
    @endif

    @if (session('error'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
                icon: "error",
                title: "{{ session('error') }}",
                customClass: {
                    confirmButton: 'bg-orange-500 text-white font-semibold py-2 px-6 rounded hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 transition-all duration-200 ease-in-out cursor-pointer border-2 border-orange-300 shadow-md hover:shadow-lg active:scale-95 mr-2',
                },
                buttonsStyling: false,

            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(button) {
            Swal.fire({
                title: "¿Estás seguro?",
                text: "Esta acción no se puede deshacer.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    confirmButton: 'bg-orange-500 text-white font-semibold py-2 px-6 rounded hover:bg-orange-600 focus:ring-2 focus:ring-orange-300 transition-all duration-200 ease-in-out cursor-pointer border-2 border-orange-300 shadow-md hover:shadow-lg active:scale-95 mr-2',
                    cancelButton: 'bg-gray-500 text-white font-semibold py-2 px-4 rounded hover:bg-gray-600',
                },
                buttonsStyling: false,
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
