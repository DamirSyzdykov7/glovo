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
    <form action="{{ route('RegistAction') }}" method="POST">
        @csrf
        <label for="RegistLogin">введите новое имя пользователя</label>
        <input id="RegistLogin" name="RegistLogin" class="@error('RegistLogin') is-invalid @enderror" type="text" >
        <label for="RegistPassword">введите новый пароль</label>
        <input id="RegistPassword" type="password" name="RegistPassword">
        <button type="submit">зарегистрироваться</button>
    </form>
</body>
</html>