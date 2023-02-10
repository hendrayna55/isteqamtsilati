<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHeader extends Model
{
    protected $table = 'header';
    protected $guarded = ['id'];
}
