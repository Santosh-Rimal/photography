<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mywork extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];
}