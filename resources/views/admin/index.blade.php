@extends('layouts.app')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>CRUD Новостей</h2>
                        @forelse($news as $item)
                            <h3>{{ $item->title }}</h3>
                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                <a class="btn btn-success" href="{{ route('admin.news.edit', $item) }}">edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete
                                </button>
                            </form>

                        @empty
                            <p>Нет новостей</p>
    @endforelse

@endsection
