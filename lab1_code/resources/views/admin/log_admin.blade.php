<!DOCTYPE html>
<html>
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/log_admin.css'])
    @vite(['resources/js/onload.js'])
</head>
<body>
<div class="bg"></div>
<div class="admin">
    <div class="text" style="text-align: left">
        <h3><a href="/index">< Вернуться</a></h3>
    </div>
    <br>
    <h3>
        Вход от имени администратора
    </h3>
    <br>
    <form method="POST" action="/admin/log_admin" style="font-weight: normal">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" placeholder="Введите логин"><br><br>

        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль"><br><br>
        <input type="submit" value="Войти" class="submit-btn">
    </form>
</div>
</body>
</html>
