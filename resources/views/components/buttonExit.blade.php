<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gray-500 dark:bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded shadow-md active:transform active:translate-y-1 mx-1 ']) }} >
    {{ $slot }}
</button>



