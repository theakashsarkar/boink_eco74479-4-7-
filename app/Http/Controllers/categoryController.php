<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function categoryAdd()
    {
        return view('admin.category.add-category');
    }

    public function manageCategory()
    {
        $categories = category::all();
        return view('admin.category.manage-category', ['categories' => $categories]);
    }
    public function saveCategory(Request $request)
    {
        $category = new category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();
        return redirect('/add-category')->with('message',"category save");
    }
    public function unpublished($id)
    {
        $category = category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect('/category/manage')->with('message',"category unpublished");
    }
    public function published($id)
    {
        $category = category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/category/manage')->with('message',"category published");
    }
    public function edit($id)
    {
        $categories = category::find($id);
        return view('admin.category.edit', ['categories' => $categories]);
    }
    public function update(Request $request)
    {
        $categories = category::find($request->category_id);
        $categories->category_name = $request->category_name;
        $categories->category_description = $request->category_description;
        $categories->publication_status = $request->publication_status;
        $categories->save();
        return redirect('/category/manage')->with('message',"category save");
    }
    public function delete($id)
    {
        $categories = category::find($id);
        $categories->delete();
        return redirect('category/manage')->with('message',"category info delete"); 
    }
}
