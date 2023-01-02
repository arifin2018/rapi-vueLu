<?php

namespace App\Http\Requests;

use App\Models\Sclass;
use Illuminate\Foundation\Http\FormRequest;

class SclassRequest extends FormRequest
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
        // $id = Sclass::where('class_name', $this->class_name)->get();
        return [
            'class_name' => 'required|unique:sclasses,class_name,' . $this->id
        ];
    }
}
