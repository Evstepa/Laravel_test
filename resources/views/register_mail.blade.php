<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome mail</title>

    <link rel="stylesheet" href="{{ asset('styles/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/normalize.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css">

</head>
<body>
    <div class="container">
        <div class="header border-0">
            <h5 class="title">Уведомление</h5>
        </div>
        <div class="form-floating mb-3">
            <p>
                Добрый день, {{ $user->name }}!
            </p>
            <p>
                Cпасибо за регистрацию!
            </p>
            <p>
                Ваш логин: {{ $user->email }}.
            </p>
            <p>
                Ваш временный пароль: {{ $password }}.
            </p>
        </div>
    </div>

</body>
</html>
