@props(['value', 'color'])
@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
@endphp
<div>
    <input type="text" id="{{ $id }}"
        class="input bg-{{ $color == 'purple' ? 'purple' : 'azur' }} font-title text-white text-[40px]  text-center rounded-full block w-[70px] h-[70px]  placeholder-white focus:outline-none"
        placeholder="__" />
</div>
@once
    @push('scripts')
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
    @endpush
@endonce
