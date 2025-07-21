@props([
    'label',
     'name',
     'optionExample' => 'Choose',
     'options' => [],
     'optionIdentifier' => 'id',
     'optionDisplay' => 'name',
     'oldValue' => null
])

<label for="{{ $name }}"
        {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1']) }}>

    {{ $label }}
    <select id="{{ $name }}" name="{{ $name }}"
            class="mt-1 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected>{{$optionExample}}</option>
        @foreach($options as $option)
            <option value="{{ ($option->{$optionIdentifier}) }}" @selected(old($name, $oldValue) == ($option->{$optionIdentifier}))>{{($option->{$optionDisplay})}}</option>
        @endforeach
    </select>
</label>

@error($name)
<span class="text-red-500">{{ $message }}</span>
@enderror
