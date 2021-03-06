<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAdminUsersRequest extends Request
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
        return [
            'name' => 'required', 
            'email' => 'required| email| unique:users',
            'role_id' => 'required',
            'is_active' => 'required',
            'photo_id' => 'required| mimes:jpeg,jpg,png,gif| max:1000',
            'password' => 'required|min:6',
        ];
    }
}
