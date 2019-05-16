<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsCreateRequest extends FormRequest
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
            'job_title'=> 'max:75|nullable',
            'company' => 'required',
            'website' => 'sometimes|nullable',
            'job_title' => 'nullable',
            'job_description' => 'nullable',
            'job_qualification' => 'nullable',
            'job_requirement' => 'nullable',
            'contact_person' => 'nullable',
            'photo_id' =>  'mimes:jpeg,jpg,png|max:4096|nullable',
            'course_id' => 'required',
            'poster' => 'sometimes',
        ];
    }
}
