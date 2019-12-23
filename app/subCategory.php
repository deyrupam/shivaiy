<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    protected  $fillable=['name','description','category_id',
    'isactive','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
