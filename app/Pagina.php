<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = [
         
        'description',
        'image',
        'page_name',
      ];
}
