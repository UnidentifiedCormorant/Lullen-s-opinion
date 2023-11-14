@props(['value', 'color'])
@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
@endphp
<div>
    <input type="text" id="{{ $id }}"
        class="input bg-{{ $color == 'purple' ? 'purple' : 'azur' }} font-title text-white lg:text-[50px] text-[20px] text-center rounded-full block lg:w-20 lg:h-20 w-12 h-12 placeholder-white focus:outline-none"
        placeholder="__" />
</div>
<script>
    var inputs = document.querySelectorAll('input[type="text"]');

    inputs.forEach(function(input) {
        input.addEventListener("keydown", function(e) {
            if (input.value.length >= 1 && e.key !== "Backspace") {
                e.preventDefault();
            }
        });
    });
</script>
