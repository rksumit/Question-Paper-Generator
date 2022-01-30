<?php

namespace App\Http\Requests;
use App\Rules\CodeRule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name' => 'required|string|max:255|',
            'address' => 'required|string|max:255|',
            'qualification' => 'required|string|max:255|',
            'experience' => 'required|string|max:255|',
            'phone' => ['required','string','min:10','max:10','unique:teachers,phone'],
            'email' => ['required','email','unique:users,email'],
        ];
    }
}
