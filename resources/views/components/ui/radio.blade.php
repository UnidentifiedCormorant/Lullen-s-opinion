@props(['name', 'text', 'value'])

@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
    $name = $name ?? 'default_radio_name'; // Используем переданное имя, если оно указано, в противном случае - устанавливаем значение по умолчанию
@endphp

<div>
    <input class="hidden peer" type="radio" id="{{ $id }}" name="{{ $name }}"
        value="{{ $value }}" />
    <label
        class="inline-flex items-center justify-between lg:py-5 lg:px-20 py-2 px-2 bg-purple rounded-full cursor-pointer peer-checked:bg-[#6F5AE3]"
        for="{{ $id }}">
        <div class="w-full">
            <div
                class="lg:text-2xl  font-main text-center text-white break-words {{ strlen($text) > 20 ? 'text-[14px]' : 'text-lg' }}">
                {{ $text }}
            </div>
        </div>
    </label>
</div>
