<div>
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    @endif
    <select id="{{ $name }}" name="{{ $name }}" {{ $attributes }}
    {{ $attributes->merge(['class' => "block w-full px-3 py-2 border-gray-200 dark:bg-gray-600 dark:text-white focus:border-2 focus:border-orange-500 dark:focus:border-orange-600 focus:ring-orange-500 dark:focus:ring-orange-600 rounded-md shadow-sm " . ($classes ?? '')]) }}

        @if ($defaultOption)
            <option value="">{{ $defaultOption }}</option>
        @endif
        @foreach ($options as $value => $option)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>
