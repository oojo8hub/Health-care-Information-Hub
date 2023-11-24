<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyGuideController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $guides = $user->guides->sortByDesc('created_at');

        return view('my-guide', [
            'guides' => $guides,
            'user' => $user,

        ]);
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();

        return redirect(route('me.guide'));
    }
}
