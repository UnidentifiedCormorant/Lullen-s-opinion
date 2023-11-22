@props(['text', 'bgColor'])

<button
    class="rounded-2xl text-white whitespace-nowrap font-main text-2xl px-[50px] py-5 max-w-[380px] bg-{{ $bgColor }}">
    {{ $text }}
</button>
