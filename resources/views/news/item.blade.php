@extends('news.layout')

@section('news-content')
    <section class="news-item block">
        <h3 class="news-item_title">{{$item->title}}</h3>
        <p class="news-item_text">
            {{$item->text}}
        </p>
        <div class="news-item_extra-info">
            <div class="info">
                <div class="info_publish-date">{{$item->publish_date}}</div>
                <div class="info_tags">
                {{$item->getTagsAsString()}}
                </div>
            </div>
            <form action="{{route('news-delete', $item->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-action">Удалить новость</button>
            </form>
        </div>
    </section>
@endsection
