@extends('main')

@section('title', 'Info')

@section('content')


    <input id="cols" type="number" value="3">
    <input id="rows" type="number" value="3">
    <button id="btn" class="btn">Создать</button>

    <div class="life" id="life">

    </div>

    @section('scripts')
        <script src="{{ asset("/js/life.js") }}"></script>
    @endsection
@endSection
