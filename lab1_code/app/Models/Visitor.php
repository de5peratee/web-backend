<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['visit_time', 'web_page', 'ip_address', 'host_name', 'browser_name'];
}

