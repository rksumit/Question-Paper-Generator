<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
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
        return array_merge((new TeacherRequest())->rules(), [
            'name' => 'required|string|max:255|',
            'address' => 'required|string|max:255|',
            'qualification' => 'required|string|max:255|',
            'experience' => 'required|string|max:255|',
            'phone' => ['required','string','max:10','unique:teachers,phone'],
            'user_id' => 'required',



        ]);
    }
}
