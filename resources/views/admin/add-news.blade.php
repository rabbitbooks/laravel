@extends('layouts.main')

@section('title')
    Админка | Добавить новость
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>Добавить новость</h2>

    <form action="">
        <h4>Название новости</h4>
        <label for="newsTitle">
            <input type="text" name="newsTitle" id="newsTitle">
        </label>
        <h4>Описание новости</h4>
        <label for="newsDesc">
            <textarea name="newsDesc" id="newsDesc" cols="30" rows="10"></textarea>
        </label>
        <br>
        <button>Добавить новость</button>
    </form>
@endsection
