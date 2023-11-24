<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\NurseUpdateRequest;
use App\Models\Nurse;
use App\Models\RegistrationClass;
use App\Models\User;
use App\Notifications\NurseCreated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class NurseApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $user = Auth::user();

        // If a user has applied to be a nurse, then redirect
        if ($user->nurse) {
            return Redirect::route('profile.edit');
        }
        $registerClasses = RegistrationClass::get();
        return view('nurse.create', ['registerClasses' => $registerClasses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(NurseUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'registration_number' => ['required', 'string', 'max:20'],
            'province' => ['required'],
            'registration_class_id' => ['required'],
            'effective_from' => ['nullable', 'date'],
            'expiration_date' => ['nullable', 'date', 'after:effective_from'],
        ]);

        $nurse = $request->user()->nurse()->create($validated);

        $users = User::permission('edit nurses')->get();
        $superAdmins = User::role('super admin')->get();
        $notifiableUsers = $users->merge($superAdmins);
        Notification::send($notifiableUsers, new NurseCreated($nurse));
        return Redirect::route('profile.edit')->withFragment('#nurse-section')->with('nurse-message', 'The application has been successfully created.');
    }


    public function edit(Request $request)
    {
        $nurse = Nurse::with(['user', 'registrationClass'])->find($request->id);

        // only pending nurse can edit application form
        if ($nurse->status !== Status::PENDING) {
            return Redirect::route('profile.edit');
        }

        $registerClasses = RegistrationClass::get();

        return view('nurse.edit', [
            'nurse' => $nurse,
            'registerClasses' => $registerClasses,
        ]);
    }

    /**
     * Update the nurse's application
     */
    public function update(NurseUpdateRequest $request): RedirectResponse
    {
        $nurse = Nurse::find($request->id);

        $nurse->fill($request->validated());

        $nurse->update();

        return Redirect::route('nurse.edit', [$nurse])->with('nurse-updated', 'The nurse application has been successfully updated.');
    }
}
