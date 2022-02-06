<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

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
            'phone' => ['required', Rule::unique('teachers', 'phone')->ignore($this->teacher), 'string', 'min:10', 'max:10'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->teacher->user), 'email', 'max:255'],
        ]);
    }
}
