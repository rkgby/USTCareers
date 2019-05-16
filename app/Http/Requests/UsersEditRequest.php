<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'last_name' => 'required|regex:/^[\pL\s]+$/u|max:20',
            'email' => 'required|email',
            'is_active' => 'required',
            'password' => 'confirmed|nullable',
            'photo_id' => 'mimes:jpeg,jpg,png | max:4096 | nullable',
        ];
    }
}
