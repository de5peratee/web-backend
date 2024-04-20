<!DOCTYPE html>
<html>
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/reg_user.css'])
    @vite(['resources/js/onload.js'])
</head>
<body>
<div class="bg"></div>
<div class="user">
    <div class="text" style="text-align: left">
        <h3><a href="/index">< Вернуться</a></h3>
    </div>
    <br>
    <h3>
        Вход от имени пользователя
    </h3>
    <br>
    <form action="/log_user" method="POST" style="font-weight: normal">
        @csrf

        @error('login')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" placeholder="Введите логин" required>
        <br><br>

        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль" required>
        <br><br>

        <input type="submit" value="Войти" class="submit-btn">

                <div class="text">
                    <h3><a href="/reg_user">Зарегистрироваться</a></h3>
                </div>
    </form>
</div>
</body>
</html>
