<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angular extends Model
{
    protected $table = 'user';
    protected $fillable = ['name', 'email', 'mobile'];
}
