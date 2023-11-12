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
        <main class="">
            <h3 class="text-gradient font-title text-2xl text-center mb-5">
                Таблица критериев
            </h3>
            <table
                class="w-full table-auto border-separate border-spacing-1 text-center font-title text-white text-xs lg:text-sm">
                <thead>
                    <tr>
                        <th class="bg-purple rounded-lg"></th>
                        @foreach ($criterias['items'] as $criteria)
                            <th class="bg-dark rounded-lg p-2">
                                {{ $criteria }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($frameworks['items'] as $framework)
                        <tr>
                            <td class="bg-dark rounded-lg p-2">
                                {{ $framework }}
                            </td>
                            @foreach ($criterias['items'] as $criteria)
                                <td class="bg-console rounded-lg p-2">1</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
        <footer>
            <button class="bg-purple rounded-2xl text-white font-main text-2xl px-[50px] py-5">
                Готово!
            </button>
        </footer>
    </div>
    <aside
        class="bg-console flex gap-y-4 flex-col md:w-2/5 w-full min-h-[500px] p-5 font-console text-consoleText text-sm">
        <p class="inline-block">
            Here`s you can see logs and numbers in process of counting.
        </p>
        <p class="inline-block">
            Check out the criteria table btws
        </p>
        <div class="flex items-center">
            <span class="text-green">lullen@lullenium</span><b>:</b><span class="text-blue">~</span>$
            <span class="bg-consoleText w-2 h-4 ml-[7px] animate-pulse"></span>
        </div>
    </aside>
</body>

</html>
