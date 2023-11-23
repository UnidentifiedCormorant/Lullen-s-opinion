@extends('front-build.layouts.layout')
@php
/**
 * @var \App\Domain\Entities\StartPageEntity $startPageData
 */
@endphp
@section('subtitle')
    <p class="font-pixel text-white text-[16px] mt-3 mb-10 ml-3 self-start">
        Экспертиза для экспертов
    </p>
@endsection
@section('content')
    <main class="gap-8 columns-2 my-auto flex flex-wrap justify-center w-full mb-10">
        <div class="flex flex-col text-center max-w-[480px] w-full">
            <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $frameworks['title'] }}</h3>
            <ul class="w-full">
                @foreach ($frameworks['items'] as $framework)
                    <x-index.card text="{{ $framework }}" color="bg-gradient-to-b from-purple to-purple-800" />
                @endforeach
            </ul>
        </div>
        <div class="flex flex-col text-center max-w-[480px] w-full">
            <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $criterias['title'] }}</h3>
            <ul class="w-full">
                @foreach ($criterias['items'] as $criteria)
                    <x-index.card text="{{ $criteria }}" color="bg-gradient-to-b from-purple to-purple-800" />
                @endforeach
            </ul>
        </div>
    </main>
    <footer class="flex justify-center">
        @if ($startPageData->progress)
            <div class="flex flex-col items-center justify-center">
                <div class="flex lg:gap-x-[50px] gap-x-[20px]">
                    <x-ui.button click="{{route('newGame')}}" text="Начать заново" bgColor="gradient-to-b from-azur to-purple" />
                    <x-ui.button click="{{route('currentStage')}}" text="Продолжить" bgColor="gradient-to-b from-azur to-purple" />
                </div>
                <div class="font-pixel text-center text-white mt-4">
                    <p>Текущий этап:</p>
                    <p>{!! $startPageData->stage->description !!}}</p>
                </div>
            </div>
        @else
            <x-ui.button click="{{route('currentStage')}}" text="Пайехали" bgColor="gradient-to-b from-azur to-purple" />
        @endif
    </footer>
@endsection
