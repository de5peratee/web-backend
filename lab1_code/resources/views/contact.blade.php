<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/contact.css'])
    @vite(['resources/js/onload.js'])
</head>
<body>
<div class="bg"></div>
<header>
    <h1>
          <span class="vhs">
              Мой персональный сайт
          </span>
    </h1>
    <nav class="vhs">
        <ul>
            <?php
            $menuItems = [
                ['href' => '/index', 'text' => 'Главная'],
                ['href' => '/about', 'text' => 'Обо мне'],
                ['href' => '/guestbook', 'text' => 'Гестбук', 'dropdown' =>[
                    ['href' => '/guestbook', 'text' => 'Гестбук'],
                    ['href' => '/admin/upload-guestbook', 'text' => 'Загрузка сообщений гостевой книги'],
                ]],
                ['href' => '/blog', 'text' => 'Блог', 'dropdown' =>[
                    ['href' => '/blog', 'text' => 'Мой блог'],
                    ['href' => '/admin/blog-editor', 'text' => 'Редактор блога'],
                    ['href' => '/admin/upload-blog', 'text' => 'Загрузка сообщений блога'],

                ]],
                ['href' => '/interests', 'text' => 'Мои интересы', 'dropdown' => [
                    ['href' => '/interests#hobby', 'text' => 'Мое хобби'],
                    ['href' => '/interests#books', 'text' => 'Мои любимые книги'],
                    ['href' => '/interests#music', 'text' => 'Моя любимая музыка'],
                    ['href' => '/interests#movies', 'text' => 'Мои любимые фильмы']
                ]],
                ['href' => '/photoalbum', 'text' => 'Фотоальбом'],
                ['href' => '/contact', 'text' => 'Контакт', 'active' => true],
                ['href' => '/test', 'text' => 'Тест по дисциплине'],
            ];

            foreach ($menuItems as $item) {
                $active = isset($item['active']) ? ' id="active"' : '';
                echo "<li class=\"dropdown\"><a href=\"{$item['href']}\" class=\"dropdown-toggle\"{$active}>{$item['text']}</a>";
                if (isset($item['dropdown'])) {
                    echo '<ul class="dropdown-menu dropdown-content">';
                    foreach ($item['dropdown'] as $dropdownItem) {
                        echo "<li><a href=\"{$dropdownItem['href']}\">{$dropdownItem['text']}</a></li>";
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            ?>
        </ul>
    </nav>
</header>

<div class="info">
    <h3>Отправить сообщение</h3>
    <form id="contactForm" action="/contact" method="post">
        @csrf
        {!! isset($errors_data['fullName']) ? '<div class="error-message">' . $errors_data['fullName'] . '</div>' : '' !!}
        <label for="fullName">Фамилия Имя Отчество:</label>
        <input type="text" id="fullName" name="fullName"><br><br>


        {!! isset($errors_data['birthday']) ? '<div class="error-message">' . $errors_data['birthday'] . '</div>' : '' !!}
        <label for="birthday">Дата рождения:</label>
        <input id="birthday" name="birthday" title="birthday" type="date"><br><br>

        {!! isset($errors_data['phone']) ? '<div class="error-message">' . $errors_data['phone'] . '</div>' : '' !!}
        <label for="phone">Телефон:</label>
        <input type="text" id="phone" name="phone"><br><br>

        {!! isset($errors_data['gender']) ? '<div class="error-message">' . $errors_data['gender'] . '</div>' : '' !!}
        <label for="gender" class="gender-label">Пол:</label>
        <input class="gender-input" type="radio" id="male" name="gender" value="Мужской">
        <label for="male">Мужской</label>
        <input class="gender-input" type="radio" id="female" name="gender" value="Женский">
        <label for="female">Женский</label>
        <input name="gender" type="radio" value="" style="display:none;" checked>
        <br><br>


        {!! isset($errors_data['age']) ? '<div class="error-message">' . $errors_data['age'] . '</div>' : '' !!}
        <label for="age">Возраст:</label><br><br>
        <select  id="age" name="age">
            <option value="">Выберите возраст</option>
            <option value="18-25">18-25</option>
            <option value="26-35">26-35</option>
            <option value="36-45">36-45</option>
            <option value="46+">46+</option>
        </select><br><br>

        {!! isset($errors_data['email']) ? '<div class="error-message">' . $errors_data['email'] . '</div>' : '' !!}
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br><br>

        {!! isset($errors_data['message']) ? '<div class="error-message">' . $errors_data['message'] . '</div>' : '' !!}
        <label for="message">Сообщение:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>

        <input id = "submit" type="submit" value="Отправить" class="submit-btn">
        <input id = "reset" type="reset" value="Очистить форму" class="reset-btn">
    </form>
</div>


<br>
<div class="low_info">
    <h3>Мои контактные данные:</h3>
    <ul>
        <li>Email: pirat-29_29@mail.ru</li>
        <li>Телефон: 8-800-555-3535</li>
        <li>Адрес: Севастополь, ул. Ленина д.12615 </li>
    </ul>
</div>
</body>
</html>
