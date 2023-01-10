@extends('main')

@section('title', 'Info')

@section('content')
    <section class="first-exercise">

        <div class="block temperature">
            <div class="block_line ">
                <div class="block_line_item city">Москва</div>
                <div class="block_line_item date">{{ date('d.m') }}</div>
            </div>
            <div class="block_line text_18 temperature_item">
                <div class="block_line_item temperature_text">
                    Температура
                </div>
                <div id="temperature" class="block_line_item temperature_info">
                    15
                </div>
            </div>
            <div class="block_line text_18 temperature_item">
                <div class="block_line_item temperature_text">
                    Ощущается как
                </div>
                <div id="feelslike" class="block_line_item temperature_info">
                    15
                </div>
            </div>
            <div id="condition" class="block_line text_12">
                Пасмурно, небольшой дождь
            </div>
        </div>

        <ul id="valute" class="currency_wrapper">
            @foreach($valute as $valuteItem)
                <li class="block currency">
                    <div id="cad" class="currency_info">1 {{$valuteItem['code']}} = {{$valuteItem['value']}} RUB </div>
                    <div class="currency_text">{{$valuteItem['name']}}</div>
                </li>
            @endforeach
        </ul>

        <div class="block btn-refresh">
            <img src="{{ asset("/img/refresh.svg") }}" alt="refresh">
        </div>
    </section>

    @section('scripts')
        <script src="{{ asset("/js/info.js") }}"></script>
    @endsection
@endSection
