<?php

namespace App\Http\Requests;

use App\Rules\CodeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;



class UpdateSubjectRequest extends FormRequest
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
        // dd($this->subject);
        return array_merge((new SubjectRequest())->rules(), [
            'name' => ['required', Rule::unique('subjects', 'name')->ignore($this->subject), 'string', 'max:255'],
            'code' => ['required', Rule::unique('subjects', 'code')->ignore($this->subject), 'string', 'max:8', new CodeRule],
        ]);
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'code' => Str::slug($this->code, '-'),
        ]);
    }
}
