<?php

namespace App\Models;

use App\Core\BaseActiveRecord;

class Interest extends BaseActiveRecord
{
    public static $interests = [
        'hobby' => [
            'title' => 'Мое хобби',
            'description' => 'Мое хобби - это создание музыки различных жанров и стилей. Я люблю экспериментировать, начиная от создания треп битов, до композиции оркестровой музыки, подобной той, что можно услышать в современных кинофильмах. Кроме музыки, я увлекаюсь программированием и изучением новых технологий и периферийных устройств.'
        ],
        'books' => [
            'title' => 'Мои любимые книги',
            'description' => 'Я предпочитаю читать книги технического и экономического формата. В моей коллекции много произведений по программированию, а также работ Котлера по маркетингу. Одной из моих самых любимых книг является "Ассемблер для начинающих". Эта книга помогла мне глубже понять принципы низкоуровневого программирования и расширить свои навыки в этой области.'
        ],
        'music' => [
            'title' => 'Моя любимая музыка',
            'description' => 'Мой музыкальный вкус довольно разнообразен, но особенно меня привлекают жанры phonk и witchouse. Эти стили популярны среди молодежи, и каждый продюсер придает им свой уникальный звук и ритм. Мне нравится слушать атмосферный фонк от LXST CXNTURY, более грубые композиции от KORDHELL, а также творчество DVRST.',
            'images' => [
                array('src' => 'images/music1.jpg', 'caption' => 'DVRST - DREAMSPACE'),
                array('src' => 'images/music2.jpg', 'caption' => 'LXST CXNTURY - ODIUM'),
                array('src' => 'images/music3.jpg', 'caption' => 'KORHELL - MURDER PLOT')
            ]
        ],
        'movies' => [
            'title' => 'Мои любимые фильмы',
            'description' => 'Я большой ценитель кино и у меня есть несколько фильмов, которые я особенно люблю. Среди них "Джон Уик" за его интенсивные боевые сцены, "Аватар" за его потрясающую визуализацию и "Остров проклятых" за его захватывающий сюжет и мастерскую игру актеров.'
        ]
    ];
}
