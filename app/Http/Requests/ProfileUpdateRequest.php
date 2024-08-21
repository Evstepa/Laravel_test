<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'surname' => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['required', 'string', 'min:10', 'max:10'],
            'status_id' => ['required', 'numeric', 'min:1', 'max:1'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'regex:/^[a-z0-9-\.+]+@[a-z0-9-]+\.[a-z]{2,}\z/i', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
