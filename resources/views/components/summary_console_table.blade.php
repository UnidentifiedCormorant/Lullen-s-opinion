@php
    use \App\Domain\Enums\CriteriaEnum;
    use \App\Domain\Enums\AlternativesEnum;
        /**
         * @var \App\Domain\Entities\ExpertSummary $expertSummary
         */
@endphp
<div class="space-y-2">
    <p class="{{ $expertSummary->expertNumber == 1 ? 'text-purple' : 'text-azur' }} ">
        This is what the expert {{ $expertSummary->expertNumber == 1 ? '1' : '2' }} stumbled upon about the final weights
    </p>
    <table class="table-console text-[12px]">
        <thead>
        <tr>
            <th>&nbsp;</th>
            @foreach(CriteriaEnum::toArray() as $criteria)
                @if($criteria == CriteriaEnum::TECHNOLOGICAL_CAPABILITIES->value)
                    <th style="font-size: 10px">{{$criteria}}</th>
                @else
                    <th>{{$criteria}}</th>
                @endif
            @endforeach
            <th>ФИНАЛЬНЫЙ ВЕКТОР</th>
        </tr>
        </thead>
        <tbody>
        @foreach(AlternativesEnum::toArray() as $alternative)
            <tr>
                <td>{{$alternative}}</td>
                @foreach($expertSummary->weights[$loop->index] as $weight)
                    <td>{{round($weight, 7)}}</td>
                @endforeach
            </tr>
            <td>
                @if($expertSummary->finalWeights[$loop->index] == $expertSummary->maxFinalWeight)
                    <span class="text-green">{{round($expertSummary->finalWeights[$loop->index], 7)}}</span>
                @else
                    {{round($expertSummary->finalWeights[$loop->index], 7)}}
                @endif
            </td>
        @endforeach
        </tbody>
    </table>
</div>
