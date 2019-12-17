<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //$category = Category::all();

         
          return view('Category.index');
        // return view('Category.index', compact('category'));       

   
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = new Category([
            'category_name' => $request->input('category-name'),
            'description' => $request->input('description'),
            'isactive' => 0,
            'updated_at'=>  date('Y-m-d H:i:s'),
            'created_at' =>  date('Y-m-d H:i:s'),
        ]);
        $category->save();
        return "sucessfull";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $editCategorie = Category::find($id);
        // return view('Category.edit', compact('editCategorie')); 

        return view('Category.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category['categor-name'] = $request->get('category-name');
        $category['description'] = $request->get('description');
        $category['isactive'] = 0;
        $category['updated_at'] = date('Y-m-d H:i:s');
        $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
