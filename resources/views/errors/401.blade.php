<x-guest-layout >
    <div class="flex flex-col items-center justify-center min-h-screen bg-orange-50 text-orange-900">
        <h1 class="text-9xl font-extrabold text-yellow-500 tracking-widest">401</h1>
        <p class="text-xl md:text-2xl font-semibold mt-4">No autenticado</p>
        <p class="text-gray-500 mt-2 text-center max-w-md">
            Debes iniciar sesión para acceder a esta página.
        </p>
        <a
            href="/login"
            class="mt-6 px-6 py-3 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-600 transition"
        >
            Iniciar sesión
        </a>
    </div>
</x-guest-layout>