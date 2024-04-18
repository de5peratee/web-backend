<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/blog-editor.css'])
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
                ['href' => '/blog', 'text' => 'Блог','active' => true, 'dropdown' =>[
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

<div class="blog-editor">
    <form method="POST" action="/blog-editor" enctype="multipart/form-data">
        @csrf
        <label for="title">Тема сообщения</label>
        <input type="text" id="title" name="title" required>
        <br><br><br>
        <label for="author">Автор</label>
        <input type="text" id="author" name="author" required>
        <br><br><br>
        <label for="image">Изображение</label>
        <div class="file-upload" style="padding-top:10px">
            <input type="file" id="image" name="image">
        </div>
        <br><br>
        <label for="body">Текст сообщения</label>
        <textarea id="body" name="body" required></textarea>
        <input type="submit" value="Добавить запись" class="submit-btn">
        <input type="reset" value="Очистить форму" class="reset-btn">
    </form>
</div>
</body>

</html>
