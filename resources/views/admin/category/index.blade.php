@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       <h2>Редактор категорий</h2>
                        <a href="{{ route('admin.category.create') }}" class="btn btn-success">Добавить категорию</a>
                        @forelse($categories as $item)
                           <h4>{{ $item->title }}</h4>
                            <form method="post" action="{{ route('admin.category.destroy', $item) }}">
                                <a class="btn btn-success" href="{{ route('admin.category.edit', $item) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
