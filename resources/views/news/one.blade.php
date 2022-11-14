@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if ($news)
        <h2>{{ $news['title']}}</h2>
        @if (!$news['isPrivate'])
            <p>{{ $news['text']}}</p>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        Нет новости с таким id
    @endif
@endsection
