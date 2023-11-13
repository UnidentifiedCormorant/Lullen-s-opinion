@php
    $id = md5(uniqid((string) mt_rand(), true)); // Генерация уникального идентификатора
@endphp
<div>
    <input type="text" id="{{ $id }}"
        class="bg-purple font-title text-white lg:text-[50px] text-[20px] text-center rounded-full block lg:w-20 lg:h-20 w-12 h-12 placeholder-white focus:outline-none"
        placeholder="__" oninput="checkInputValue()" />
</div>
<script>
    var inputs = document.querySelectorAll('input[type="text"]');

    inputs.forEach(function(input) {
        input.addEventListener("input", function() {
            if (input.value) {
                input.classList.remove("bg-purple");
                input.classList.add("bg-[#6F5AE3]");
            } else {
                input.classList.add("bg-purple");
                input.classList.remove("bg-[#6F5AE3]");
            }
        });
    });
</script>
