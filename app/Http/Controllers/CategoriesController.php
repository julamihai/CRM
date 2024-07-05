<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('user_id', Auth::id())->get();
        return view('categories.categories', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate(['title'=>'required']);
        $category = new Categories();
        $category->title = $request->title;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route('categories.index',compact('category'));
    }
    public function edit(int $id)
    {
        $categories = Categories::find($id);
        return view('categories.edit', compact('categories'));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'title'=>'required'
        ]);

        $categories = Categories::find($id);
        $categories->update([
            'title'=>$request->input('title')
        ]);
        return redirect()->route('categories.index', compact('categories'));
    }
    public function delete(int $id)
    {
        $categories = Categories::find($id);
        if ($categories){
            $categories->delete();
        }
        return redirect()->route('categories.index', compact('categories'));
    }
}
