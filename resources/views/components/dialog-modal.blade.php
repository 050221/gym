@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-2xl font-medium text-gray-900 dark:text-gray-600">
            {{ $title }}
        </div>

        <div class="mt-4 text-base text-gray-600 dark:text-gray-300">
            {{ $content }}
        </div>
    </div>

    <div class="flex justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800">
        {{ $footer }}
    </div>
</x-modal>
