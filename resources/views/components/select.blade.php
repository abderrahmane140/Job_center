@props([
    'name',
    'id' => $name,
    'options' => [],
    'selected' => null,
])

<select
    name="{{ $name }}"
    id="{{ $id }}"
    {{ $attributes->merge([
        'class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
    ]) }}
>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
            {{ $label }}
        </option>
    @endforeach
</select>
