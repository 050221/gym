<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-gray-50 to-orange-100 dark:bg-gray-900">

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div class="my-5 justify-items-center">
            <div>
                {{ $logo }}
            </div>
            
        </div>
       
        {{ $slot }}
    </div>
</div>
