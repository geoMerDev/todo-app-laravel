
@props(['name', 'items' => [], 'disabled' => false])

<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm', 'disabled' => $disabled, 'id' => $name, 'name' => $name]) }}>
    <option value="" selected>Select an option</option>
    @foreach($items as $value => $text)
        <option value="{{ $value }}">{{ $text }}</option>
    @endforeach
</select>