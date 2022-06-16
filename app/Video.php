<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'order',
        'url',
      ];

      public function category(){
    
        return $this->belongsTo(Category::class);
        
    
      }
}
