@props([
    'label',
    'name',
    'placeholder' => '',
    'error' => false,
    'class' => '',
    'labelClass' => '',
    'multiple' => false
])

@if ($label)
    <label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 ' . $labelClass]) }}>
        {{ $label }}
    </label>
@endif

<input type="file" id="{{$name}}" placeholder="{{ $placeholder }}" name="{{ $name }}" @if($multiple) multiple @endif
       class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

@error($name)
    <span class="text-red-500">{{ $message }}</span>
@enderror
