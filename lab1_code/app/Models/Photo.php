<?php

namespace App\Models;

use App\Core\BaseActiveRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends BaseActiveRecord
{
    use HasFactory;
    const PHOTOS = [
        ['filename' => '/images/photo1.jpg', 'caption' => 'Кот повар'],
        ['filename' => '/images/photo2.jpg', 'caption' => 'Кот спит'],
        ['filename' => '/images/photo3.jpg', 'caption' => 'Кот устал'],
        ['filename' => '/images/photo4.jpg', 'caption' => 'Кот плавает'],
        ['filename' => '/images/photo5.jpg', 'caption' => 'Кот смотрит'],
        ['filename' => '/images/photo6.jpg', 'caption' => 'Кот скучает'],
        ['filename' => '/images/photo7.jpg', 'caption' => 'Кот в шоках'],
        ['filename' => '/images/photo8.jpg', 'caption' => 'Кот в недоумении'],
        ['filename' => '/images/photo9.jpg', 'caption' => 'Кот удивлен'],
        ['filename' => '/images/photo10.jpg', 'caption' => 'Кот отдыхает'],
        ['filename' => '/images/photo11.jpg', 'caption' => 'Кот залипает'],
        ['filename' => '/images/photo12.jpg', 'caption' => 'Кот после зала'],
        ['filename' => '/images/photo13.jpg', 'caption' => 'Кот на ТПР'],
        ['filename' => '/images/photo14.jpg', 'caption' => 'Кот ест'],
        ['filename' => '/images/photo15.jpg', 'caption' => 'Кот празднует'],
    ];
}
