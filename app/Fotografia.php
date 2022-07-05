<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fotografia extends Model
{
   use SoftDeletes;

    protected $fillable = [
      'title',
      'description',
      'category_id',
      'order',
      'image',
      'is_active',
    ];

    public function category(){

      return $this->belongsTo(Category::class);
      //return $this->hasOne('App\Category');

    }

}
