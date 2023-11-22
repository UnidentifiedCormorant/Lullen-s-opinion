<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lullen's opinion</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="grid lg:grid-cols-12 grid-cols-1">
<div class="bg-main p-5 space-y-5 lg:col-span-7 flex flex-col justify-between">
    <div>
        <header class="w-full bg-console rounded-2xl flex items-center justify-between p-[15px]">
            <h1 class="text-white font-title text-4xl">
                Lullen's opinion
            </h1>
            @yield('expert')
        </header>
        @yield('subtitle')
    </div>
    @yield('content')
</div>
<aside class="bg-console p-4 space-y-2 lg:col-span-5 min-w-min font-console text-consoleText text-sm bold ">
    <p>
        Here`s you can see logs and numbers in process of counting.
    </p>
    @yield('console')
    <div class="flex items-center">
        <span class="text-green">lullen@lullenium</span><b>:</b><span class="text-blue">~</span>$
        <span class="bg-consoleText w-2 h-4 ml-[7px] animate-pulse"></span>
    </div>
</aside>
</body>

</html>
