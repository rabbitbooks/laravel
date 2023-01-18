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
                        <h2>Редактирование пользователей</h2>
                        <div class="row justify-content-left">
                            <div class="col-md-3">Имя</div>
                            <div class="offset-md-1 col-md-3">Почта</div>
                            <div class="offset-md-1">Действие</div>
                        </div>
                            @forelse($users as $user)
                            <div class="row justify-content-left">
                                <div class="col-md-3">{{ $user->name }}</div>
                                <div class="offset-md-1 col-md-3">{{ $user->email }}</div>
                                @if($currentUser->id != $user->id)<button data-id="{{ $user->id }}" class="offset-md-1 send {{$user->is_admin ? 'btn btn-danger' : 'btn btn-success'}}">{{$user->is_admin ? 'Забрать админку' : 'Сделать админом'}}</button>@endif
                            </div>
                            @empty
                                <p>Нет зарегистрированных пользователей</p>
                            @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let buttons = document.querySelectorAll('.send');
        buttons.forEach((elem) => {
            elem.addEventListener('click', () => {
                let id = elem.getAttribute('data-id');
                (
                    async () => {
                        const response = await fetch('/admin/ajax', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json;charset=utf-8',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify({
                                id: id
                            })
                        });
                        const answer = await response.json();
                        console.log(answer);
                        if (answer.status === 'ok') {
                            if (elem.classList.contains('btn-danger')) {
                                elem.classList.remove('btn-danger');
                                elem.classList.add('btn-success');
                                elem.innerHTML = 'Сделать админом';
                            } else {
                                elem.classList.remove('btn-success');
                                elem.classList.add('btn-danger');
                                elem.innerHTML = 'Забрать админку';
                            }
                        }
                    }
                )();
            })
        });
    </script>
@endsection
