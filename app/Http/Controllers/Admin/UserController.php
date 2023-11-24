<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the edit user page for user management
     */
    public function edit(Request $request)
    {
        $user = User::findOrFail($request->id);

        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

}
