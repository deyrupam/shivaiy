<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected  $fillable=['category_name','description',
    'isactive','created_at','updated_at'];

    public function subcategories(){

        return $this->hasMany(SubCategory::Class);
    }
}
