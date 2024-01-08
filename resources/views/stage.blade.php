@extends('front-build.layouts.layout')

@php
/**
 * @var \App\Domain\Entities\StageEntity $stageData
 */
@endphp

@section('expert')
    <div
        class="{{ $stageData->stage->expert == 1 ? 'bg-purple' : 'bg-azur' }} rounded-lg flex items-center text-white font-title text-xl whitespace-nowrap px-8 py-3">
        {{ $stageData->stage->expert == 1 ? 'Эксперт 1' : 'Эксперт 2' }}
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
                        <th class="{{ $stageData->stage->expert == 1 ? 'bg-purple' : 'bg-azur' }} rounded-lg"></th>
                        @foreach ($criterias['items'] as $criteria)
                            <th class="bg-dark rounded-lg p-2 {{ strlen($criteria) > 40 ? 'text-[12px]' : '' }}">
                                {{ $criteria }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="bg-dark rounded-lg p-2">Angular</td>
                    <td class="bg-console rounded-lg p-2">50</td>
                    <td class="bg-console rounded-lg p-2">9</td>
                    <td class="bg-console rounded-lg p-2">9</td>
                    <td class="bg-console rounded-lg p-2">4</td>
                    <td class="bg-console rounded-lg p-2">1</td>
                </tr>
                <tr>
                    <td class="bg-dark rounded-lg p-2">React.js</td>
                    <td class="bg-console rounded-lg p-2">80</td>
                    <td class="bg-console rounded-lg p-2">5</td>
                    <td class="bg-console rounded-lg p-2">7</td>
                    <td class="bg-console rounded-lg p-2">5</td>
                    <td class="bg-console rounded-lg p-2">4</td>
                </tr>
                <tr>
                    <td class="bg-dark rounded-lg p-2">Vue.js</td>
                    <td class="bg-console rounded-lg p-2">74</td>
                    <td class="bg-console rounded-lg p-2">7</td>
                    <td class="bg-console rounded-lg p-2">3</td>
                    <td class="bg-console rounded-lg p-2">3</td>
                    <td class="bg-console rounded-lg p-2">3</td>
                </tr>
                <tr>
                    <td class="bg-dark rounded-lg p-2">Dojo 2</td>
                    <td class="bg-console rounded-lg p-2">51</td>
                    <td class="bg-console rounded-lg p-2">9</td>
                    <td class="bg-console rounded-lg p-2">2</td>
                    <td class="bg-console rounded-lg p-2">1</td>
                    <td class="bg-console rounded-lg p-2">4</td>
                </tr>
                <tr>
                    <td class="bg-dark rounded-lg p-2">Ember</td>
                    <td class="bg-console rounded-lg p-2">68</td>
                    <td class="bg-console rounded-lg p-2">10</td>
                    <td class="bg-console rounded-lg p-2">3</td>
                    <td class="bg-console rounded-lg p-2">2</td>
                    <td class="bg-console rounded-lg p-2">2</td>
                </tr>
                </tbody>
            </table>
        </div>
        <p class="text-white font-pixel text-[12px] text-left">
            {!! $stageData->stage->description !!}.
            Выберете наиболее важный критерий из каждой пары и определите насколько он важнее другого по десятибалльной шкале.
        </p>
        <form action="{{route('nextStage')}}" method="post">
            @csrf
            <div class="max-h-[42vh] overflow-y-auto scrollbar-thin scrollbar-track-console scrollbar-thumb-purple">
                @for ($i = 0; $i < 5; $i++)
                    @for ($j = $i + 1; $j < 5; $j++)
                        <div class="grid w-full gap-x-6 mb-6 items-center grid-cols-[43%_43%_auto]">
                            <x-ui.radio :color="$stageData->stage->expert == 1 ? 'purple' : 'azur'" :name="'selection_' .$i . '_' . $j" :text="$stageData->buttonsTitles[$i]" :value="$i"/>
                            <x-ui.radio :color="$stageData->stage->expert == 1 ? 'purple' : 'azur'" :name="'selection_' .$i . '_' .$j" :text="$stageData->buttonsTitles[$j]" :value="$j"/>
                            <x-ui.number :color="$stageData->stage->expert == 1 ? 'purple' : 'azur'" :name="'rate_'.$i . '_' .$j"/>
                        </div>
                    @endfor
                @endfor
                <div class="flex justify-center">
                    <x-ui.button type="submit" click="" text="Готово!" bgColor="{{ $stageData->stage->expert == 1 ? 'purple' : 'azur' }}"/>
                </div>
            </div>
        </form>
    </main>
@endsection

@section('console')
    <p>Check out the criteria table btw</p>
    <div class="space-y-4" id="console-content">
        @foreach($consoleLogs as $log)
            <x-console_table :log="$log" />
        @endforeach
    </div>
    @if(session()->has('consistency_relationship_error') )
        <p><span class="text-red">{{session()->get('consistency_relationship_error')}}</span></p>
    @endif
@endsection
