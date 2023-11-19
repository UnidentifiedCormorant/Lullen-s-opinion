@extends('front-build.layouts.layout')
@php
    $expert_1 = [
        'name' => 'Expert 1',
        'weight' => '0.0069',
        'color' => 'purple',
        'framework' => 'Angular',
    ];
    $expert_2 = [
        'name' => 'Expert 2',
        'weight' => '0.0063',
        'color' => 'azur',
        'framework' => 'React.js',
    ];
    $color = $expert_1['weight'] > $expert_2['weight'] ? $expert_1['color'] : $expert_2['color'];
    $name = $expert_1['weight'] > $expert_2['weight'] ? $expert_1['name'] : $expert_2['name'];
@endphp
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
            Подведение итогов:
        </p>
        <div class="columns-2 gap-8">
            <div class="text-center">
                <h2 class="text-gradient font-title text-2xl lg:text-4xl mb-5">
                    Эксперт 1
                </h2>
                <ul class="class="w-full">
                    <x-index.card text="{{ $frameworks['items'][1] }}" color="bg-purple" />
                </ul>
            </div>
            <div class="text-center">
                <h2 class="text-gradient font-title text-2xl lg:text-4xl mb-5">
                    Эксперт 2
                </h2>
                <ul class="class="w-full"">
                    <x-index.card text="{{ $frameworks['items'][2] }}" color="bg-azur" />
                </ul>
            </div>
        </div>
    </main>
@endsection
@section('console')
    <p>Check out the criteria table btw</p>
    <p>Let's summarize, find out who is the most lullen here:</p>

    <p>
        <span class="text-purple">{{ $expert_1['name'] }}</span>
        choose {{ $expert_1['framework'] }}, and it's weights:
        <span class="text-blue">w={{ $expert_1['weight'] }}</span>
    </p>

    <p>
        <span class="text-azur">{{ $expert_2['name'] }}</span>
        choose {{ $expert_2['framework'] }}, and it's weights:
        <span class="text-blue">w={{ $expert_2['weight'] }}</span>
    </p>

    <p>
        <span class="text-green uppercase">WINNER:</span>
        <span class="text-{{ $color }}">{{ $name }}</span>
    </p>

    <p><span class="text-blue uppercase">CONGRADS!</span> <span class="text-red">(get off now)</span></p>
@endsection
