<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class BaseActiveRecord extends Model
{
    public static function find($id)
    {
        return static::query()->find($id);
    }

    public static function findAll()
    {
        return static::query()->get();
    }
}
