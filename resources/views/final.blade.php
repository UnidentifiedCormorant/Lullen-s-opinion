@extends('front-build.layouts.layout')
@php
    use App\Domain\Entities\FinalStageEntity;
    use Illuminate\Support\Collection;

    /**
     * @var Collection $consoleLog
     * @var FinalStageEntity $finalData
     */

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
                    <x-index.card text="{{$finalData->expertOneSummary->selectedAlternative}}" color="bg-purple" />
                </ul>
            </div>
            <div class="text-center">
                <h2 class="text-gradient font-title text-2xl lg:text-4xl mb-5">
                    Эксперт 2
                </h2>
                <ul class="class="w-full"">
                    <x-index.card text="{{$finalData->expertTwoSummary->selectedAlternative}}" color="bg-azur" />
                </ul>
            </div>
        </div>
    </main>
@endsection
@section('console')
    <p>Check out the criteria table btw</p>

    <div class="space-y-4" id="console-content">
        @foreach($consoleLogs as $log)
            <x-console_table :log="$log" />
        @endforeach
    </div>

    {{--TODO: Замутить отступ между таблицами--}}
    <x-summary_console_table :expertSummary="$finalData->expertOneSummary" />
    <x-summary_console_table :expertSummary="$finalData->expertTwoSummary" />

    <p>Let's summarize, find out who is the most lullen here:</p>
    <p>
        <span class="text-purple">{{ $expert_1['name'] }}</span>
        choose {{$finalData->expertOneSummary->selectedAlternative}}, and it's max weight:
        <span class="text-blue">w={{ $finalData->expertOneSummary->maxFinalWeight }}</span>
    </p>

    <p>
        <span class="text-azur">{{ $expert_2['name'] }}</span>
        choose {{$finalData->expertTwoSummary->selectedAlternative}}, and it's weights:
        <span class="text-blue">w={{ $finalData->expertTwoSummary->maxFinalWeight }}</span>
    </p>

    <p>
        <span class="text-green uppercase">WINNER:</span>
        <span class="text-{{ $color }}">{{ $finalData->winner }}</span>
    </p>
    <p><span class="text-blue uppercase">CONGRADS!</span> <span class="text-red">(get off now)</span></p>
@endsection
