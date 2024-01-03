<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lullen's opinion</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="grid lg:grid-cols-12 grid-cols-1 ">
    <div class="bg-main p-5 flex flex-col lg:col-span-7">
        <header class="w-full bg-console rounded-2xl flex items-center justify-between p-[15px]">
            <h1 class="text-white font-title text-4xl">
                Lullen's opinion
            </h1>
            @yield('expert')
        </header>
        @yield('subtitle')
        <div class="mt-5">
            @yield('content')
        </div>
    </div>
    <aside id="console"
        class="bg-console p-4 space-y-2 lg:col-span-5 min-w-min font-console text-consoleText text-sm bold overflow-auto max-h-[100vh] scrollbar-thin scrollbar-track-dark scrollbar-thumb-consoleText">
        <p>
            Here`s you can see logs and numbers in process of counting.
        </p>
        @yield('console')
        <div class="flex items-center pt-4">
            <span class="text-green">lullen@lullenium</span><b>:</b><span class="text-blue">~</span>$
            <span class="bg-consoleText w-2 h-4 ml-[7px] animate-pulse"></span>
        </div>
    </aside>
</body>
@stack('scripts')
<script>
    // // Получаем элемент блока, который нужно прокрутить
    // const consoleElement = document.querySelector('aside');

    // // Прокручиваем блок вниз
    // consoleElement.scrollTop = consoleElement.scrollHeight - consoleElement.clientHeight;

    // document.addEventListener("DOMContentLoaded", () => {
    //     for (let i = 0; i < 10; i++) {
    //         setTimeout(() => {
    //             const consoleContent = document.getElementById('console-content');
    //             const newElement = document.createElement('p');
    //             newElement.textContent = "New log message " + (i + 1);
    //             consoleContent.appendChild(newElement);
    //
    //             // Автоматическая прокрутка вниз при добавлении нового элемента
    //             scrollConsoleToBottom();
    //         }, i * 2000);
    //     }
    // });

    // Функция для прокрутки блока вниз
    function scrollConsoleToBottom() {
        const console = document.getElementById('console');
        console.scrollTop = console.scrollHeight - console.clientHeight;
    }
</script>

</html>
