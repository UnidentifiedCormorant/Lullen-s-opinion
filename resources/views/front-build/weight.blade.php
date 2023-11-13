@extends('front-build.layouts.layout')
@php
    $count = count($criterias['items']);
@endphp
@section('expert')
    <div class="bg-purple rounded-lg flex items-center text-white font-title text-xl whitespace-nowrap px-8 py-3">
        Эксперт 1
    </div>
@endsection
@section('content')
    <main class="mt-5">
        <h3 class="text-gradient font-title text-2xl text-center mb-5">
            Таблица критериев
        </h3>
        <table
            class="w-full table-fixed border-separate border-spacing-1 text-center font-title text-white text-[10px] break-words lg:text-sm mb-5">
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
        <p class="text-white font-pixel lg:text-[16px] text-xs text-left mb-5">
            Выберете наиболее важный критерий из каждой пары и определите насколько он важнее другого по десятибальной шкале
        </p>
        <div class="flex flex-col items-center justify-between">
            @for ($i = 0; $i < $count; $i++)
                @for ($j = $i + 1; $j < $count; $j++)
                    @php
                        $unique_name = "selection_{$i}_{$j}"; // Генерация уникального имени для пары
                    @endphp
                    <div class="columns-2 flex gap-2 mb-2">
                        <x-ui.radio :name="$unique_name" :text="$criterias['items'][$i]" :value="$i" />
                        <x-ui.radio :name="$unique_name" :text="$criterias['items'][$j]" :value="$j" />
                        <x-ui.number />
                    </div>
                @endfor
            @endfor
        </div>
    </main>
    <footer class="mt-5">
        <x-ui.button text="Готово!" bgColor="purple" />
    </footer>
@endsection
