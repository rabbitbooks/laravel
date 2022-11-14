@extends('layouts.main')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h2>Главная</h2>
<p>Добро пожаловать!</p>
@endsection
