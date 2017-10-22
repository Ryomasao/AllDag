<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        error_log("rules");

        return [
            'name' => 'required',
            'email' => ['required','string','email','max',
                Rule::unique('users')->ignore($user->id),
        ],
            'password' => 'required',
            'role' => 'required',
        ];
    }
}
