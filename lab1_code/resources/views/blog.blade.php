<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/blog.css'])
    @vite(['resources/js/onload.js'])
</head>
<body>
<div class="bg"></div>
<header>
    <h1>
        <span class="vhs">
          Мой персональный сайт
        </span>
        @if (auth()->check())
            <div class="vhs" style="font-size: 15px">
                {{ auth()->user()->name }}
            </div>
        @endif
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
                ['href' => '/blog', 'text' => 'Блог', 'active' => true, 'dropdown' =>[
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
                ['href' => '/admin/visitors', 'text' => 'Посетители']
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

<h2 style="text-align: center;">
    Посты
</h2>
@foreach ($posts as $post)
    <div class="blog">
        <div class="post">
            @if ($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="Post Image">
            @endif
            <div class="text-content">
                <div>
                    <p class="date">{{ $post->created_at }}</p>
                    <p class="author">{{ $post->author }}</p>
                </div>

                <div class="main-info">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach


<div class="pagination">
    {{ $posts->links() }}
</div>

</body>
</html>
