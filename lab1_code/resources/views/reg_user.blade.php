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
        Регистрация пользователя
    </h3>
    <br>
    <form action="/reg_user" method="POST" style="font-weight: normal">
        @csrf

        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="name">ФИО:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Введите ФИО" required>
        <br><br>

        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Введите ваш emal" required>
        <br><br>

        @error('login')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="login">Логин:</label><br>
        <input type="text" id="login" name="login" value="{{ old('login') }}" placeholder="Введите логин" required>
        <br><br>

        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password" placeholder="Введите пароль" required>
        <br><br>

        @error('password_confirmation')
        <div class="error">{{ $message }}</div>
        @enderror
        <label for="password_confirmation">Повторите пароль:</label><br>
        <input type="password" id="password_confirmation"  name="password_confirmation" placeholder="Повторите ваш пароль" required>
        <br><br>

        <input type="submit" value="Войти" class="submit-btn">

        <div class="text">
            <h3><a href="/log_user">Уже есть аккаунт</a></h3>
        </div>
    </form>
</div>
</body>
</html>
