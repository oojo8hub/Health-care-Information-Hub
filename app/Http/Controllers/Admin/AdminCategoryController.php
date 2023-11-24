<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;


class AdminCategoryController extends Controller
{
    /**
     * Display the category form
     */
    public function edit(Request $request)
    {
        $admin_category = Category::findOrFail($request->id);

        return view('admin.categories.edit', [
                'admin_category' => $admin_category]
        );
    }


    /**
     * Create  the category
     */
    public function create(): View
    {

        return view('admin.categories.create');
    }

    /**
     * Store the category
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories'],
            'active' => ['required']
        ]);

        $admin_category = Category::create([
            'name' => Str::lower($request->name),
            'active' => $request->active
        ]);

        return Redirect:: route('admin_category.index')->with('admin_category-message', 'The category has been successfully created.');
    }

    /**
     * Update the category
     */
    public function update(Request $request)
    {

        $admin_category = Category::where('id', $request->id)->first();

        $data = $request->validate([
            'name' => [
                'required',
                Rule::unique(Category::class)->ignore($admin_category->id, 'id'),
            ],
            'active' => ['required']
        ]);

        $admin_category->update($data);
        return Redirect::route('admin_category.index', [$admin_category])->with('admin_category-message', 'The category has been successfully updated');
    }
}
