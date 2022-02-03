<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class CategoryController extends Controller
{
    //Category_list--------
    public function categoryList(){
        $categories=Category::all();
    //    dd($categories);
        return view('asset.category_list',compact('categories'));
        }
    //Category_of_asset---------
    public function asset_category()
    {
        return view('asset.asset_category');
    }
    //Create_category---------
    public function category_create(Request $request)
    {
            // dd($request->all());

        $request->validate([
            'Cname'=>'required'
            

        ]);
        Category::create([
            'Cname'=>$request->Cname
            
        ]);
        return redirect()->back()->with('success','Category Created Successfully.');
    }
   //Delete_category-----------
    public function deleteCategory($category_id)
    {
        Category::find($category_id)->delete();
        return redirect()->back()->with('sucecess', 'Category has beeen Deleted Successfully');
    }
}
