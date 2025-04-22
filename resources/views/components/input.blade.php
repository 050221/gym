@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
{!! $attributes->merge(['class' => 'w-full border-gray-200  dark:bg-gray-600 dark:text-white placeholder-gray-500 dark:placeholder-gray-300 focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm']) !!}>

