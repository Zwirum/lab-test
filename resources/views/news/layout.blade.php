@extends('main')

@section('title', 'News')

@section('content')

    <form class="news-form" action="{{route('news-search')}}" method="POST">
        @csrf
        <p class="news-form_discr">Найти или создать новость:</p>
        <div class="news-search">
            <input type="text" placeholder="Введите id или заголовок новости..." name="search" value="{{$search ?? ''}}">
            <button class="btn btn-search" type="submit">Найти</button>
            <a href="{{route('news-create-page')}}" class="btn btn-action">Создать</a>
        </div>
    </form>

    @yield('news-content')

@endsection
