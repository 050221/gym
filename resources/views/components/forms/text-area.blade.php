<div>
    <textarea id="{{ $name }}" name="{{ $name }}" 
        {{ $attributes->merge(['class' => "w-full p-2 border-gray-200  dark:bg-gray-600 dark:text-white focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm$classes"]) }}
        rows="{{ $rows }}" placeholder="{{ $placeholder }}" {{ $attributes }}>{{ old($name) }}</textarea>
</div>
