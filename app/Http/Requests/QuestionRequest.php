<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' => ['required', 'string', 'max:255', 'unique:questions,question'],
            'weightage' => 'required|gt:0',
            'topic_id' => 'required|integer|exists:topics,id',
            'difficulty_level' => 'required',
        ];
    }
}
