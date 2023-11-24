<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NurseUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'registration_number' => ['required', 'string', 'max:20'],
            'province' => ['required'],
            'registration_class_id' => ['required'],
            'effective_from' => ['nullable', 'date'],
            'expiration_date' => ['nullable', 'date', 'after:effective_from'],
        ];
    }
}
