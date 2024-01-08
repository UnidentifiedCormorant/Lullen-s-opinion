@props(['value', 'color', 'name'])
@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
@endphp
<div>
    <input type="text" id="{{ $id }}" name="{{ $name }}"
        class="input bg-{{ $color == 'purple' ? 'purple' : 'azur' }} font-title text-white text-[40px]  text-center rounded-full block w-[70px] h-[70px]  placeholder-white focus:outline-none"
        placeholder="__"
        autocomplete="off"
    />
</div>
@once
    @push('scripts')
        <script>
            var inputs = document.querySelectorAll('input[type="text"]');

            inputs.forEach(function(input) {
                input.addEventListener("keydown", function(e) {
                    if ((input.value.length >= 1 && e.key !== "Backspace")) {
                        e.preventDefault();
                    }
                });
                input.addEventListener("select", function() {
                    var selection = window.getSelection().toString();
                    if (selection.includes("1")) {
                        window.getSelection().removeAllRanges();
                    }
                });
            });
        </script>
    @endpush
@endonce
