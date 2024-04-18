<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/guestbook.css'])
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
                ['href' => '/guestbook', 'text' => 'Гестбук', 'active' => true, 'dropdown' =>[
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
                ['href' => '/contact', 'text' => 'Контакт'],
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

<div class="guestbook">
    <h2>Гостевая книга</h2>
    <form method="POST" action="/guestbook">
        @csrf

        <label for="surname">Фамилия:</label>
        <input type="text" id="surname" name="surname"><br><br>

        <label for="name">Имя:</label>
        <input type="text" id="name" name="name"><br><br>

        <label for="patronymic">Отчество:</label>
        <input type="text" id="patronymic" name="patronymic"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="review">Текст отзыва:</label>
        <textarea id="review" name="review"></textarea><br><br>

        <input type="submit" value="Отправить" class="submit-btn">
        <input type="reset" value="Очистить форму" class="reset-btn">
    </form>

    <h3>Отзывы:</h3>
    <div>
        @foreach ($messages as $message)
            <div class="guests">
                <div style="display: flex; justify-content: space-between;">
                    <p style="font-size: 0.9em; ">{{ $message[1] ?? '' }} {{ $message[2] ?? '' }} {{ $message[3] ?? '' }}</p>
                    <p style="font-size: 0.7em; padding-right: 5px; font-weight: normal;">{{ $message[0] ?? '' }}</p>
                </div>
                <p style="text-align: left; margin-top: 7px;font-weight: normal;">«{{ $message[5] ?? '' }}»</p>
            </div>
            <br><br>
        @endforeach
    </div>
</div>
</body>
</html>
