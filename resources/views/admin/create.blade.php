@extends('layouts.app')

@section('title', 'Создать новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif" enctype="multipart/form-data">
                            @csrf
                            @if ($news->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{ old('title') ?? $news->title }}">

                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">
                                    @foreach($categories as $item)
                                        <option
                                            @if ($item->id == old('category_id') ?? $item->id == $news->category_id) selected @endif
                                            value="{{ $item->id }}">{{ $item['title'] }}
                                        </option>
                                    @endforeach
                                </select>


                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{ old('text') ?? $news->text}}</textarea>

                                <div class="form-check">

                                    <input
                                        @if ($news->isPrivate == 1 || old('isPrivate')) checked @endif
                                        name="isPrivate" type="checkbox" value="1">
                                    <label for="newsPrivate">Приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary" type="submit" value="@if ($news->id){{__('Изменить')}}@else{{__('Добавить')}}@endif новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
