<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use SoftDeletes;

    protected $fillable= [

        'question',
        'answer',
        'is_active',
    ];
    
}
