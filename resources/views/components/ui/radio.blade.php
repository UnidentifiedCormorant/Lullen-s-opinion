@props(['name', 'text', 'value', 'color'])

@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
    $name = $name ?? 'default_radio_name'; // Используем переданное имя, если оно указано, в противном случае - устанавливаем значение по умолчанию
@endphp

<div>
    <input class="hidden peer" type="radio" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value }}" />
    <label
        class="inline-flex items-center justify-center w-full lg:py-5 lg:px-20 py-2 px-2 bg-{{ $color == 'purple' ? 'purple' : 'azur' }} rounded-full cursor-pointer 
        peer-checked:bg-dark-{{ $color == 'purple' ? 'purple' : 'azur' }}"
        for="{{ $id }}">
        <div class="lg:text-2xl font-main text-center text-white whitespace-nowrap text-[14px]">
            {{ $text }}
        </div>
    </label>
</div>
