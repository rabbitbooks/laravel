@extends('layouts.app')

@section('title')
    @parent Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Главная</h2>
                        <p>Добро пожаловать!</p>
                        <button class="sendData">sendData</button>
                        <div class="result"></div>
                        <script>
                            document.querySelector('.sendData').onclick = e => {
                                e.preventDefault();
                                sendData();
                            }

                            const $result = document.querySelector('.result');

                            function sendData() {
                                const data = {
                                    popup_id: 4
                                };

                                const xhr = new XMLHttpRequest();

                                xhr.open("POST", "https://get-popup/request");
                                xhr.setRequestHeader("Content-Type", "application/json");
                                xhr.onload = () => {
                                    if (xhr.status === 200) {
                                        // console.log(JSON.parse(xhr.responseText))
                                        console.log(xhr.responseText)
                                        $result.innerHTML = xhr.responseText;
                                    } else {
                                        console.log("Server response: ", xhr.statusText);
                                    }
                                };
                                xhr.send(JSON.stringify(data));
                                // xhr.send(data);
                            }
                            // let response = await fetch('https://get-popup/request', {
                            //     method: 'POST',
                            //     mode: 'cors',
                            //     referrerPolicy: 'origin-when-cross-origin',
                            //     headers: {
                            //         'Content-Type': 'application/json',
                            //         'Origin' : 'https://laravel'
                            //     },
                            //     body: JSON.stringify(data)
                            // });
                            //
                            // $result.innerHTML = await response/*.json()*/;
                            // console.log(response)
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
