<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lullen's opinion</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="flex flex-wrap">
    <div class="bg-main flex flex-col flex-1 items-center md:w-3/5 w-full lg:p-6 p-3">
        <header class="w-full bg-console rounded-2xl flex items-center justify-between p-[15px]">
            <h1 class="text-white font-title text-4xl">
                Lullen's opinion
            </h1>
            @yield('expert')
        </header>
        @yield('subtitle')
        @yield('content')
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
