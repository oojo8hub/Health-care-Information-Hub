<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display the permission form
     */
    public function edit(Request $request)
    {
        $permission = Permission::find($request->id);

        return view('admin.permissions.edit', [
            'permission' => $permission
            ]
        );

    }
}
