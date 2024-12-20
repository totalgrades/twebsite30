<?php

namespace App\Http\Controllers\Admin\Documentation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function categories()
    {
    	return view('admin.documentation.categories');
    }

    public function storeNewCategory(Request $request){

	   	$category = new Category();
	   	$category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
	   	
	   	$category->save();
        flash('Category Added successfully!')->success();
   		return back();
   }

   public function storeEditCategory(Request $request, Category $category){
	   	$category = Category::where('id', $category->id)->first();
	   	$category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
	   	
	   	$category->save();
        flash('Category Edited successfully!')->success();
   		return back();
   }
   
   public function deleteCategory(Category $category)
    {
    	Category::where('id', $category->id)->delete();
        flash('Category deleted!')->warning();
    	return back();
    }
}
