<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoleController extends Controller
{

    /**
     * Display the role form
     */
    public function edit(Request $request)
    {
        $role = Role::findOrFail($request->id);
        return view('admin.roles.edit', [
                'role' => $role]
        );
    }

    /**
     * Create  the role
     */
    public function create(): View
    {
        return view('admin.roles.create');
    }

    /**
     * Update the role
     */
    public function update(Request $request)
    {

    }

    /**
     * store the role
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:roles']
        ]);

        $role = Role::create([
            'name' => Str::lower($request->name)
        ]);
        return Redirect:: route('role.edit', ['id' => $role->id])->with('role-message', 'The role has been successfully created.');
    }


}
