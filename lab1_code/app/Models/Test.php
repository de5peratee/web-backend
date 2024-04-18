<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'group',
        'q1',
        'q2',
        'q3',
        'q1_correct',
        'q2_correct',
        'q3_correct'
    ];
}
