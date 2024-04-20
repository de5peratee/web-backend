<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/visitors.css'])
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
                ['href' => '/about', 'text' => 'Обо мне', 'dropdown'=>[
                    ['href' => '/about', 'text' => 'Обо мне'],
                    ['href' => '/photoalbum', 'text' => 'Фотоальбом'],
                    ['href' => '/contact', 'text' => 'Контакт'],
                ]],
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
                ['href' => '/test', 'text' => 'Тест по дисциплине'],
                ['href' => '/admin/visitors', 'text' => 'Посетители', 'active' => true]
            ];
            if (auth()->check()) {
                $menuItems[] = ['href' => '/logout', 'text' => 'Выход'];
            } else {
                $menuItems[] = ['href' => '/log_user', 'text' => 'Вход', 'dropdown' =>[
                    ['href' => '/log_user', 'text' => 'Войти как пользователь'],
                    ['href' => '/admin/log_admin', 'text' => 'Войти как администратор'],
                ]];
            }

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


<table>
    <tr>
        <th>Время визита</th>
        <th>Страница</th>
        <th>Внешний IP адрес</th>
        <th>Имя устройства</th>
        <th>Браузер</th>
    </tr>
    @foreach ($visitors as $visitor)
        <tr>
            <td>{{ $visitor->visit_time }}</td>
            <td>{{ $visitor->web_page }}</td>
            <td>{{ $visitor->ip_address }}</td>
            <td>{{ $visitor->host_name }}</td>
            <td>{{ $visitor->browser_name }}</td>
        </tr>
    @endforeach
</table>

<div class="pagination">
    {{ $visitors->links() }}
</div>

<br>
</body>
</html>