<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index', [
            'categories' => Category::withCount(['guides' => function ($query) {
                $query->where('published', 1);
            }])->where('active', 1)->orderBy('name')->get(),
        ]);
    }

    public function create()
    {
        //
    }

    public function edit(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        $category = Category::with(['guides'])->find($request->id);
        return view('category.show', [
            'category' => $category,
        ]);

    }
}
