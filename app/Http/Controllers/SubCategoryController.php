<?php

namespace App\Http\Controllers;

use App\subCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategory = subCategory::all();
        return view('SubCategory.index', compact('subCategory')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subcat');
             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new subCategory([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'cat_id' => $request->input('catid'),
            'isactive' => 0,
            'updated_at'=>  date('Y-m-d H:i:s'),
            'created_at' =>  date('Y-m-d H:i:s'),
        ]);
        $subcategory->save();
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(subCategory $subCategory)
    {
        $editSubCategorie = subCategory::find($id);
        return view('SubCategory.edit', compact('editSubCategorie')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCategory = subCategory::find($id);
        $subCategory['name'] = $request->get('name');
        $subCategory['description'] = $request->get('description');
        $subCategory['isactive'] = 0;
        $subCategory['cat_id'] = $request->get('cat_id');
        $subCategory['updated_at'] = date('Y-m-d H:i:s');
        $subCategory->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = subCategory::find($id);
        $subcategory->delete();
    }
}
