<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class Utilities
{
    public static function verifyOrder($rqOrder,$rqLastOrder,$fieldNameOrder,$tableName,$rqCategoryId = null,$rqLastCategory = null,$fieldNameCatId = null)
    {

        if($rqOrder != $rqLastOrder){
            if($rqCategoryId != null){
                $verfIfExist = DB::table($tableName)->where($fieldNameOrder,$rqOrder)->where($fieldNameCatId,$rqCategoryId)->get();
                if($verfIfExist->isNotEmpty()){
                    DB::table($tableName)->where($fieldNameOrder,$rqOrder)->where($fieldNameCatId,$rqCategoryId)->update([$fieldNameOrder => $rqLastOrder]);
                }
                //dd($verfIfExist->isEmpty());
            }else{
                DB::table($tableName)->where($fieldNameOrder,$rqOrder)->update([$fieldNameOrder => $rqLastOrder]);
            }
        }

    }

}
