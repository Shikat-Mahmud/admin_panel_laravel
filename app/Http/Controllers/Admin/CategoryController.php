<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->hasAnyPermission(['create-category', 'show-category', 'edit-category', 'delete-category'])) {
            $categories = Category::all();
            return view('admin.main.category.index', compact('categories'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to Categories.');
        }
    }

    public function create()
    {
        if (auth()->user()->can('create-category')) {
            return view('admin.main.category.create');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to add category.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            Category::create([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);
            return redirect()->route('categories.index')->with('success', 'Category create successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        if (auth()->user()->can('show-category')) {
            $category = Category::findOrFail($id);
            return view('admin.main.category.show', compact('category'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to show category.');
        }
    }


    public function edit(string $id)
    {
        if (auth()->user()->can('edit-category')) {
            $categories = Category::find($id);
            return view('admin.main.category.edit', compact('categories'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to edit category.');
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $category = Category::find($id);

            $category->update([
                'name' => $request->input('name'),
                'status' => $request->input('status')
            ]);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function destroy(string $id)
    {
        if (auth()->user()->can('delete-category')) {
            Category::find($id)->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete category.');
        }
    }
}
