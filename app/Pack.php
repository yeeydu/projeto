<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'summary',
        'description',
        'image',
        'price',
        'order',
        'is_active',
    ];


}
