<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'class_id'  => 'required|integer',
            'section_id' => 'required|integer',
            'name'      => 'required|string|max:25',
            'phone'     => 'required|numeric',
            'email'     => 'required|email',
            'password'  => 'required|string|confirmed',
            'photo'     => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'address'   => 'required|string',
            'gender'    => 'required|in:male,female'
        ];
    }
}
