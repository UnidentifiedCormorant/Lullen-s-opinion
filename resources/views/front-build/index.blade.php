<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lullen's opinion</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

@php
    $frameworks = [
        'title' => 'Альтернативы',
        'items' => ['Angular', 'React.js', 'Vue.js', 'Dojo 2', 'Ember'],
    ];
    $criterias = [
        'title' => 'Критерии',
        'items' => ['Сложность разработки', 'Сложность разработки', 'Технологические возможности', 'Спрос', 'Сложность внедрения'],
    ];
@endphp

<body class="flex flex-wrap">
    <div class="bg-main flex flex-col flex-1 items-center md:w-3/5 w-full p-6">
        <header class="w-full bg-console rounded-2xl flex items-center justify-between p-[15px] mb-10">
            <h1 class="text-white font-title text-4xl">
                Lullen's opinion
            </h1>
            <div
                class="bg-purple rounded-lg flex items-center text-white font-title text-xl whitespace-nowrap px-8 py-3">
                Эксперт 1
            </div>
        </header>
        <main class="gap-8 columns-2 my-auto flex flex-wrap justify-center w-full">
            <div class="flex flex-col text-center max-w-[480px] w-full">
                <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $frameworks['title'] }}</h3>
                <ul class="w-full">
                    @foreach ($frameworks['items'] as $framework)
                        <li
                            class="bg-gradient-to-b from-purple to-purple-800 rounded-full w-full p-3 text-white font-main text-2xl lg:text-3xl mb-5">
                            {{ $framework }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="flex flex-col text-center max-w-[480px] w-full">
                <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $criterias['title'] }}</h3>
                <ul class="w-full">
                    @foreach ($criterias['items'] as $criteria)
                        <li
                            class="bg-gradient-to-b from-purple to-purple-800 rounded-full w-full p-3 text-white font-main text-2xl lg:text-3xl mb-5">
                            {{ $criteria }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </main>
        <footer>
            <button
                class="bg-gradient-to-b from-azur to-purple rounded-2xl text-white font-main text-2xl px-[50px] py-5">
                Пайехали
            </button>
        </footer>
    </div>
    <aside
        class="bg-console flex flex-col items-left md:w-2/5 w-full min-h-[500px] p-5 font-console text-consoleText text-sm">
        <p class=" inline-block mb-5">
            Here`s you can see logs and numbers in process of counting.
        </p>
        <div class="flex items-center">
            <span class="text-green">lullen@lullenium</span><b>:</b><span class="text-blue">~</span>$
            <span class="bg-consoleText w-2 h-4 ml-[7px] animate-pulse"></span>
        </div>
    </aside>
</body>

</html>
