@php
use App\Domain\Enums\CriteriaEnum;
    /**
     * @var \App\Domain\Entities\StageConsoleLogEntity $log
     */
@endphp
<div class="space-y-2">
        <p class="{{ $log->stage->expert == '1' ? 'text-purple' : 'text-azur' }} ">
            {!! $log->stage->description !!}
        </p>
    <table class="table-console text-[12px]">
        <thead>
        <tr>
            <th>&nbsp;</th>
            @foreach($log->tableTitles as $title)
                @if($title == CriteriaEnum::TECHNOLOGICAL_CAPABILITIES->value)
                    <th style="font-size: 10px">{{$title}}</th>
                @else
                    <th>{{$title}}</th>
                @endif
            @endforeach
            <th>Composition</th>
            <th>Weights</th>
        </tr>
        </thead>
        <tbody>
        @foreach($log->tableTitles as $title)
            <tr>
                @if($title == CriteriaEnum::TECHNOLOGICAL_CAPABILITIES->value)
                    <th style="font-size: 10px">{{$title}}</th>
                @else
                    <th>{{$title}}</th>
                @endif
                @foreach($log->criteriaTable->matrix[$loop->index] as $number)
                    <td>{{$number}}</td>
                @endforeach
                <td>{{$log->criteriaTable->compositions[$loop->index]}}</td>
                <td><span class="text-green">{{round($log->criteriaTable->weights[$loop->index], 7)}}</span></td>
            </tr>
        @endforeach
            <th>Суммы</th>
            @foreach($log->criteriaTable->sums as $sum)
                <td><span class="text-blue">{{$sum}}</span></td>
            @endforeach
            <td><span class="text-blue">{{array_sum($log->criteriaTable->compositions)}}</span></td>
            <td><span class="text-yellow">{{array_sum($log->criteriaTable->weights)}}</span></td>
        </tbody>
    </table>
    <p class="{{ $log->stage->expert == '1' ? 'text-purple' : 'text-azur' }} ">
        ☑ λmax: {{ $log->criteriaTable->lambdaMax }}
    </p>
    <p class="{{ $log->stage->expert == '1' ? 'text-purple' : 'text-azur' }} ">
        ☑ Индекс согласованности: {{ $log->criteriaTable->consistencyIndex }}
    </p>
    <p class="{{ $log->stage->expert == '1' ? 'text-purple' : 'text-azur' }} ">
        ☑ Отношение согласованности: {{ $log->criteriaTable->consistencyRelationship }} < 0.1
    </p>
</div>
