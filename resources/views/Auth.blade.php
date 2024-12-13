<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
@if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('AuthAction') }}" method="POST">
        @csrf
        <label for="AuthLogin">введите имя пользователя</label>
        <input type="text" name="AuthLogin" class="@error('AuthLogin') is-invalid @enderror">
        <label for="AuthPasssword">введите пароль</label>
        <input type="password" name="AuthPassword">
        <button type="submit">войти</button>
    </form>
    <a href="{{ route('RegistShow') }}"><button type="submit">Зарегистрироватся</button></a>
</body>
</html>