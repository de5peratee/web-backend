<!DOCTYPE html>
<html lang="RU">
<head>
    <title>Мой персональный сайт</title>
    <meta charset="UTF-8">
    @vite(['resources/css/test.css'])
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
                ['href' => '/test', 'text' => 'Тест по дисциплине', 'active' => true],
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

<h3>Тест по дисциплине "ВЕБ-технологии"</h3>
<div class="info">
        <div class="t">
            @if (session('status'))
                <div class="{{ session('status') == 'Форма отправлена' ? 'good' : 'bad' }}">
                    {{ session('status') }}
                </div>
            @endif

            <h3>Ввод данных и ответы на тестовые вопросы:</h3>
            <div class="container">
                <form id="form2" action="/test" method="post">
                    @csrf
                    {!! isset($errors_data['fullName']) ? '<div class="error-message">' . $errors_data['fullName'] . '</div>' : '' !!}

                    <label for="fullName" class="t">Фамилия Имя Отчество:</label>
                    @if(Auth::check())
                        <input type="text" id="fullName" name="fullName" value="{{ Auth::user()->name }}" readonly><br><br>
                    @else
                        <input type="text" id="fullName" name="fullName"><br><br>
                    @endif

                    {!! isset($errors_data['group']) ? '<div class="error-message">' . $errors_data['group'] . '</div>' : '' !!}
                    <label for="group">Группа:</label>
                    <select id="group" name="group">
                        <option value="">Выберите группу</option>
                        <option value="1 курс">1 курс</option>
                        <option value="2 курс">2 курс</option>
                        <option value="3 курс">3 курс</option>
                        <option value="4 курс">4 курс</option>
                    </select>
                    <br><br>
                    <!-- Вопрос 1 (Textarea) -->
                    <div class="question-container">
                        <p>1. Как зовут преподавателя, кто принимает у тебя лабу?</p>
                        {!! isset($errors_data['q1']) ? '<div class="error-message">' . $errors_data['q1'] . '</div>' : '' !!}
                        <label for="q1">Введите ваш ответ:</label>
                        <textarea id="q1" name="q1" rows="4" cols="50"></textarea><br><br>
                        <div class="result-hint">

                            @if(isset($results))
                                @if($results['q1'] == 'Верно')
                                    <div class='good'>{{ $results['q1'] }}</div>
                                @else
                                    <div class='bad'>{{ $results['q1'] }}
                                        <br>
                                        {{"Правильный ответ: " . $answers['q1']}}
                                    </div>
                                @endif
                            @endif

                        </div>
                    </div>
                    <br><br>
                    <!-- Вопрос 2 (Radio 4) -->
                    <div class="question-container">
                        <p>2. На каком ты предмете?</p>
                        {!! isset($errors_data['q2']) ? '<div class="error-message">' . $errors_data['q2'] . '</div>' : '' !!}

                        <div class="radio-container">
                            <input name="q2" type="radio" value="" style="display:none;" checked>
                            <input type="radio" id="q2" name="q2" value="ВЕБ технологии">
                            <label for="q2">ВЕБ технологии</label><br>
                            <input type="radio" name="q2" value="Разработка мобильных приложений">
                            <label for="q2">Разработка мобильных приложений</label><br>
                            <input type="radio" name="q2" value="Компьютерная схемотехника">
                            <label for="q2">Компьютерная схемотехника</label><br>
                            <input type="radio" name="q2" value="Дома">
                            <label for="q2">Дома</label><br><br>
                        </div>
                        <div>
                            @if(isset($results))
                                @if($results['q2'] == 'Верно')
                                    <div class='good'>{{ $results['q2'] }}</div>
                                @else
                                    <div class='bad'>{{ $results['q2'] }}
                                    <br>
                                    {{"Правильный ответ: " . $answers['q2']}}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                    <br><br>

                    <!-- Вопрос 3 (Select 2) -->
                    <div class="question-container">
                        <p>3. Что мы тут изучаем?</p>
                        {!! isset($errors_data['q3']) ? '<div class="error-message">' . $errors_data['q3'] . '</div>' : '' !!}

                        <select id="q3" name="q3">
                            <option value="" selected>Не выбрано</option>
                            <option value="HTML и CSS">HTML и CSS</option>
                            <option value="PHP и DB">PHP и DB</option>
                        </select><br><br>
                        <div>
                            @if(isset($results))
                                @if($results['q3'] == 'Верно')
                                    <div class='good'>{{ $results['q3'] }}</div>
                                @else
                                    <div class='bad'>{{ $results['q3'] }}
                                        <br>
                                        {{"Правильный ответ: " . $answers['q3']}}
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>

                    <!-- Кнопки отправки и очистки формы -->
                    <br>
                    <div class="button-container">
                        <input type="submit" value="Отправить" class="submit-btn">
                        <input type="reset" value="Очистить форму" class="reset-btn">
                    </div>
                </form>
            </div>
            <br><br>
        </div>

</div>
<br>
</body>
</html>
