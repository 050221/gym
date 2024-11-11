<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <title>{{ config('app.name', 'Gym') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
