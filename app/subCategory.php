<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    
    protected  $fillable=['name','description','cat_id',
    'isactive','created_at','updated_at'];
}
