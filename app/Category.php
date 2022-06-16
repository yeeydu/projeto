<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function fotografias(){
        
       return $this->hasMany('App\Fotografia');
       //return $this->belongsTo(Fotografia::class);
    
      }

      public function videos(){
        
        return $this->hasMany('App\Videos');
     
       }
}
