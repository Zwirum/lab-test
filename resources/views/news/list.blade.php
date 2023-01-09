@extends('news.layout')

@section('news-content')
    <section class="news">
        <ul class="news-list">
            @foreach($news as $newsItem)
                <li class="block">
                    <a class="news-list_item " href="{{route('news-item', $newsItem->id)}}">
                        <span class="item_info">
                            <span class="item_info_id">{{$newsItem->id}}</span>
                            <span class="item_info_title">{{$newsItem->title}}</span>
                        </span>
                        <span class="item_anons" >
                            {{$newsItem->anons}}
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
