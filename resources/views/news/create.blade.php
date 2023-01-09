@extends('news.layout')

@section('news-content')
    <form action="{{route('news-create')}}" class="create-form" method="POST">
        @csrf
        <div class="create-form_item">
            <lable for="title">Заголовок:</lable>
            <input type="text" name="title" required>
        </div>
        <div class="create-form_item">
            <lable for="anons">Краткое описание:</lable>
            <input type="text" name="anons" required>
        </div>
        <div class="create-form_item">
            <lable for="text">Текст:</lable>
            <input type="text" name="text" required>
        </div>
        <div class="create-form_item">
            <div>Теги:</div>
            @foreach($tags as $tag)
                <lable>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                    {{$tag->name}}
                </lable>
            @endforeach
        </div>
        <button type="submit" class="btn">Создать</button>
    </form>
@endsection
