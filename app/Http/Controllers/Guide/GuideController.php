<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Guide;
use App\Models\User;
use App\Notifications\GuideCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

class GuideController extends Controller
{
    public function create()
    {
        $categories = Category::where('active', 1)->get();
        return view('guide.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $published = $request->published ? true : false;

        $request->validate([
            'topic' => ['required', 'unique:guides',],
            'content' => ['required'],
            'category_id' => ['required'],
        ]);

        $guide = Guide::create([
            'topic' => ucfirst($request->topic),
            'slug' => str_slug($request->topic),
            'content' => $request->content,
            'published' => $published,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        $users = User::permission('publish guides')->get();
        $superAdmins = User::role('super admin')->get();
        $notifiableUsers = $users->merge($superAdmins);
        Notification::send($notifiableUsers, new GuideCreated($guide));

        if ($request->previousUrl === URL::route('me.guide')) {
            return Redirect::route('me.guide')->with('guide-message', 'The guide has been successfully created.');
        } else {
            return Redirect::route('guide.show', [$guide])->with('guide-message', 'The guide has been successfully created.');
        }
    }


    public function show(Request $request)
    {
        $guide = Guide::with(['user', 'category'])->where('slug', $request->slug)->firstOrFail();

        if (!$guide->published && !Auth::check()) {
            abort(404);
        }

        // Adding a visit to the guide.
        $guide->visit();

        return view('guide.show', [
            'guide' => $guide,
        ]);
    }


    public function edit(Request $request)
    {
        $guide = Guide::with(['user', 'category'])->where('slug', $request->slug)->first();

        $this->authorize('view', $guide);

        $categories = Category::get();

        return view('guide.edit', [
            'guide' => $guide,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request)
    {
        $guide = Guide::where('slug', $request->slug)->first();

        $data = $request->validate([
            'topic' => [
                'required',
                Rule::unique(Guide::class)->ignore($guide->id, 'id')
            ],
            'content' => ['required'],
            'category_id' => ['required'],
            'published' => [
                Rule::when($request->published, ['required']),
            ],
        ]);

        $guide->update($data);

        if ($request->previousUrl === URL::route('me.guide')) {
            return Redirect::route('me.guide')->with('guide-message', 'The guide has been successfully updated.');
        } else {
            return Redirect::route('guide.show', [$guide])->with('guide-message', 'The guide has been successfully updated.');
        }


    }
}
