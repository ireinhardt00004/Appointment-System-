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
            //'profile_pic' => ['required', 'file', 'mimes:jpeg,png,gif', 'max:5000'], // 3000 kilobytes = 3 megabytes
            'lname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'contact_num' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
