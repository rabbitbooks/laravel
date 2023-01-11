@extends('layouts.app')

@section('title', 'Создать категорию')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>@if (!$category->id) Добавить категорию
                            @else Редактировать категорию @endif
                        </h2>
                        <form method="POST" action="@if(!$category->id){{ route('admin.category.store') }} @else {{ route('admin.category.update', $category) }}@endif">
                            @csrf
                            @if($category->id) @method('PUT') @endif
                            <div class="form-group">
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <label for="categoryName">Название категории</label>
                                <input class="form-control" type="text" id="categoryName" name="title" value="{{ old('title') ?? $category->title}}">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="@if ($category->id){{__('Изменить')}}@else{{__('Добавить')}}@endif категорию">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
