<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Sub_category;
use App\Models\gallery;

class ProductController extends Controller
{
    public function index(){
        $product = new Product;
        $categories =  categories::all();
        $products = $product->get_products();
        return view('products/index',compact('products','categories'));
    }
    public function getdata(Request $request){
    	if(!empty($request->category_id))
        {
          return Sub_category::whereIn('category_id',[$request->category_id])->get();
    	}
    }
    public function view(Request $request){
    
        if(!empty($request->product_id))
        {
            $data=[];
            $cat_id = Product::find($request->product_id)->category_id;
            $sub_id = Product::find($request->product_id)->sub_category_id;  
            $data   = Product::find($request->product_id);
            $data['image'] = Product::find($request->product_id)->gallery->first()->image;
            $data['category'] = Categories::find($cat_id)->category_name;
            $data['sub_category'] = Sub_category::find($sub_id)->name;
            $data['form_key'] = $request->form_key;
            return $data; 
        }
    }
    public function update(Request $request){
        if(!empty($request->product_id))
        {
           $product =  Product::find($request->product_id); 
           $product->product_name          = $request->product_name;
           $product->product_short_desc    = $request->product_short_desc;
           $product->product_desc          = $request->product_desc;
           $product->product_weight        = $request->product_weight;
           $product->product_sku           = $request->product_sku;
           $product->product_stock         = $request->product_stock;
           $product->product_org_price     = $request->product_org_price;
           $product->product_selling_price = $request->product_selling_price;
           $product->category_id           = $request->category_id;
           $product->sub_category_id       = $request->sub_category_id;
           $product->save();
           $product_id = $request->product_id;
       
           $gallery = new gallery;
           $gallery_arr = [];
           $file = $request->file('imgpath');
           if(!empty($file))
           {
                foreach ($request->file('imgpath') as $file) 
                {
                    $file_name =  $file->getClientOriginalName();
                    $file_extension  = $file->getClientOriginalExtension();
                    $destinationPath = 'uploads';
                    $file->move($destinationPath,$file_name);
                    $gallery_arr['product_id'] = $product_id;
                    $gallery_arr['image'] = $file_name;
                    gallery::insert($gallery_arr); 
                }
           }
           return 'success'; 
        } 
    }
    public function delete(Request $request){
        if(!empty($request->product_id))
        {   
            $ids = $request->product_id;
            $explode_ids = explode(',',$ids);
            foreach($explode_ids as $id){
                Product::destroy($request->product_id);
            }
            return 'success';
        }
    }
    public function store(Request $request){
       
        $product = new Product;
        $product->product_name          = $request->product_name;
        $product->product_short_desc    = $request->product_short_desc;
        $product->product_desc          = $request->product_desc;
        $product->product_weight        = $request->product_weight;
        $product->product_sku           = $request->product_sku;
        $product->product_stock         = $request->product_stock;
        $product->product_org_price     = $request->product_org_price;
        $product->product_selling_price = $request->product_selling_price;
        $product->category_id           = $request->category_id;
        $product->sub_category_id       = $request->sub_category_id;
        $product->save();
        $product_id = Product::latest()->first()['id'];
       
        $gallery = new gallery;
        $gallery_arr = [];
        $file = $request->file('imgpath');
	    foreach ($request->file('imgpath') as $file) {
	      	$file_name =  $file->getClientOriginalName();
		    $file_extension  = $file->getClientOriginalExtension();
		    $destinationPath = 'uploads';
		    $file->move($destinationPath,$file_name);
		    $gallery_arr['product_id'] = $product_id;
		    $gallery_arr['image'] = $file_name;
            gallery::insert($gallery_arr); 
	    }
        return 'success'; 
    }
}
