<div class="block__content">




    <body>
    <div class="container">
        <div class="row">
            <form method="POST" action="register" style="text-align: center; margin: auto;">
                {!! csrf_field() !!}

                <div>
                    Имя
                    <input style="margin: 10px;" type="text" name="name" id="name">
                </div>
                <div>
                    Email
                    <input style="margin: 10px;" type="email" name="email" id="email">
                </div>

                <div>
                    Пароль
                    <input style="margin: 10px;" type="password" name="password" id="password">
                </div>


                <div>
                    <button style="margin: 10px;" type="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </body>


</div>
