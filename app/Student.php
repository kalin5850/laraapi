<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $dateFormat = 'U';
    protected $fillable = ['name', 'course'];
}
