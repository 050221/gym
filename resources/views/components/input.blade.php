@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
{!! $attributes->merge(['class' => 'w-full border-gray-300 dark:border-orange-700 dark:bg-gray-900 dark:text-gray-300 focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm']) !!}>
