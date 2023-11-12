@extends('front-build.layouts.layout')
@section('content')
        <main class="gap-8 columns-2 my-auto flex flex-wrap justify-center w-full">
            <div class="flex flex-col text-center max-w-[480px] w-full">
                <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $frameworks['title'] }}</h3>
                <ul class="w-full">
                    @foreach ($frameworks['items'] as $framework)
                        <x-index.card framework="{{$framework}}" />
                    @endforeach
                </ul>
            </div>
            <div class="flex flex-col text-center max-w-[480px] w-full">
                <h3 class="text-gradient font-title text-2xl lg:text-4xl mb-10">{{ $criterias['title'] }}</h3>
                <ul class="w-full">
                    @foreach ($criterias['items'] as $criteria)
                        <x-index.card framework="{{$criteria}}" />
                    @endforeach
                </ul>
            </div>
        </main>
        <footer>
            <button
                class="bg-gradient-to-b from-azur to-purple rounded-2xl text-white font-main text-2xl px-[50px] py-5">
                Пайехали
            </button>
        </footer>
@endsection
