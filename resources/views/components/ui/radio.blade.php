@props(['name', 'text', 'value', 'color'])

@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
    $name = $name ?? 'default_radio_name'; // Используем переданное имя, если оно указано, в противном случае - устанавливаем значение по умолчанию
@endphp

<div>
    <input class="hidden peer" type="radio" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value }}" />
    <label
        class="inline-flex items-center justify-center w-full py-5 px-20 bg-{{ $color == 'purple' ? 'purple' : 'azur' }} rounded-full cursor-pointer
        {{$color == 'purple' ? 'peer-checked:bg-dark-purple' : 'peer-checked:bg-dark-azur'}}"
        for="{{ $id }}">
        <div class="text-2xl font-main text-center text-white whitespace-nowrap">
            {{ $text }}
        </div>
    </label>
</div>
