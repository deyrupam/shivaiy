<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public function get_products(){
    	$products = DB::table('products as pro')
    	->join('galleries as gal','pro.id','=','gal.product_id')
    	->leftJoin('categories as cat','pro.category_id','=','cat.id')
    	->leftJoin('sub_categories as sub','pro.sub_category_id','=','sub.category_id')
    	->select('pro.*','cat.category_name as category','sub.name as sub_category','gal.image')
		->groupBy('pro.id')
		->orderBy('pro.id', 'desc')
    	->get();
    	return $products;
	}
	public function gallery(){
		return $this->hasMany('App\Models\gallery','product_id');
	}   
}
