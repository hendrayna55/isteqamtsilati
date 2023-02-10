<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHome extends Model
{
    // use HasFactory;
    protected $table = 'home';
    protected $guarded = ['id'];
}
