<?php

namespace App\Http\Requests;

use App\Rules\CodeRule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:subjects,name',
            'code' => ['required','string','max:8','unique:subjects,code', new CodeRule],
            'teacher_id' => 'required|int|exists:teachers,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => Str::slug($this->code, '-'),
        ]);
    }
}
