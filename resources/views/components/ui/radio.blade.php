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
        {{ $color == 'purple' ? 'peer-checked:bg-dark-purple' : 'peer-checked:bg-dark-azur' }} relative overflow-hidden transition ease-in-out delay-10 text-2xl font-main text-center text-white whitespace-nowrap select-none"
        for="{{ $id }}">
        {{ $text }}
    </label>
</div>
@once
    @push('scripts')
        <script>
            const rads = document.querySelectorAll('label');

            rads.forEach((el) => {
                el.addEventListener("click", function(e) {
                    let size = Math.max(this.offsetWidth, this.offsetHeight),
                        x = e.offsetX - size / 2,
                        y = e.offsetY - size / 2,
                        wave = this.querySelector(".wave");

                    // Create an element if it doesn't exist
                    if (!wave) {
                        wave = document.createElement("span");
                        wave.className = "wave";
                    }
                    wave.style.cssText = `width:${size}px;height:${size}px;top:${y}px;left:${x}px`;
                    this.appendChild(wave);
                });
            });
        </script>
    @endpush
@endonce
