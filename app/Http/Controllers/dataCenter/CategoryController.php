<?php

namespace App\Http\Controllers\dataCenter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.show', compact('categories'));
    }

    public function addCategory()
    {
        return view('category.add');
    }

    public function saveCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string|min:10'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.show')->with('success', 'Category added successfully');

    }

    public function editCategory()
    {
        return view('category.edit');
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.show')->with('success', 'Category updated successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.show')->with('success', 'Category deleted successfully');
    }

}
