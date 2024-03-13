<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['username', 'email'];
}
