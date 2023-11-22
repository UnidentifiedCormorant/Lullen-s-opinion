@extends('front-build.layouts.layout')
@php
    $count = count($criterias['items']);
    $expert_1 = true;
    $expert_2 = false;
@endphp
@section('expert')
    <div
        class="{{ $expert_1 == true ? 'bg-purple' : 'bg-azur' }} rounded-lg flex items-center text-white font-title text-xl whitespace-nowrap px-8 py-3">
        {{ $expert_1 == true ? 'Эксперт 1' : 'Эксперт 2' }}
    </div>
@endsection
@section('content')
    <main class="space-y-5">
        <div>
            <h3 class="text-gradient font-title text-2xl text-center mb-4">
                Таблица критериев
            </h3>
            <table class="w-full table-fixed border-separate border-spacing-1 text-center font-title text-white break-words">
                <thead>
                    <tr>
                        <th class="{{ $expert_1 == true ? 'bg-purple' : 'bg-azur' }} rounded-lg"></th>
                        @foreach ($criterias['items'] as $criteria)
                            <th class="bg-dark rounded-lg p-2 {{ strlen($criteria) > 40 ? 'text-[12px]' : '' }}">
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
        </div>
        <p class="text-white font-pixel text-[16px] text-left">
            Выберете наиболее важный критерий из каждой пары и определите насколько он важнее другого по десятибальной шкале
        </p>
        <div>
            @for ($i = 0; $i < $count; $i++)
                @for ($j = $i + 1; $j < $count; $j++)
                    @php
                        $unique_name = "selection_{$i}_{$j}"; // Генерация уникального имени для пары
                        $idontno = 69;
                    @endphp
                    <div class="grid w-full gap-x-6 mb-6 items-center grid-cols-[43%_43%_auto]">
                        <x-ui.radio :color="$expert_1 == true ? 'purple' : 'azur'" :name="$unique_name" :text="$criterias['items'][$i]" :value="$i" />
                        <x-ui.radio :color="$expert_1 == true ? 'purple' : 'azur'" :name="$unique_name" :text="$criterias['items'][$j]" :value="$j" />
                        <x-ui.number :color="$expert_1 == true ? 'purple' : 'azur'" :value="$idontno" />
                    </div>
                @endfor
            @endfor
        </div>
    </main>
    <footer class="flex justify-center">
        <x-ui.button text="Готово!" bgColor="{{ $expert_1 == true ? 'purple' : 'azur' }}" />
    </footer>
@endsection
@section('console')
    <p>Check out the criteria table btw</p>
    {{-- TODO: Понять как  прокидывать нужные данные в компоеннту и отображать в таблице --}}
    <x-console.table expert="{{ $expert_1 }}" />
    <x-console.table expert="{{ $expert_2 }}" />
@endsection
