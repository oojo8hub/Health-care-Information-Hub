<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Models\RegistrationClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NurseController extends Controller
{
    /**
     * Display the edit user page for user management
     */
    public function edit(Request $request)
    {
        $nurse = Nurse::with(['user', 'registrationClass'])->where('id', $request->id)
            ->firstOrFail();
        $registerClasses = RegistrationClass::get();
        return view('admin.nurses.edit', [
            'nurse' => $nurse,
            'registerClasses' => $registerClasses,
        ]);
    }

    public function update(Request $request)
    {
        $nurse = Nurse::find($request->id);

        $data = $request->validate([
            'verified' => ['required'],
            'registration_number' => ['required', 'string', 'max:20'],
            'province' => ['required'],
            'registration_class_id' => ['required'],
            'effective_from' => ['nullable', 'date'],
            'expiration_date' => ['nullable', 'date', 'after:effective_from'],
        ]);

        $nurse->verified_at = date('Y-m-d H:i:s');

        if ($request->verified == 1) {
            $nurse->status = Status::VERIFIED;
            $nurse->user->assignRole('writer');
        } else {
            $nurse->status = Status::DENIED;
            $nurse->user->removeRole('writer');
        }

        $nurse->update($data);

        return Redirect::route('admin_nurse.index', [$nurse])->with('nurse-message', 'The nurse account has been successfully updated');

    }

}
