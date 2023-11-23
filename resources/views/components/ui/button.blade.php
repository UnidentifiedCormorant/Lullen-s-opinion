@props(['text', 'bgColor', 'click'])

<button onclick="{{ $click }}"
    class="rounded-2xl text-white whitespace-nowrap font-main text-2xl px-[50px] py-5 max-w-[380px] bg-{{ $bgColor }} relative overflow-hidden">
    {{ $text }}
</button>
@once
    @push('scripts')
        <script>
            const btns = document.querySelectorAll("button");

            btns.forEach((el) => {
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
