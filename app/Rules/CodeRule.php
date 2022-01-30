<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $arr = explode('-', $value);
//        $data = 'csc-1234'
//        $ARR = ['CSC1234', '1234']
        if (count($arr) == 2 && !is_numeric($arr[0]) && is_numeric($arr[1])) {
            if (strlen($arr[0]) == 3 && (strlen($arr[1]) == 4))
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Subject Code must be in format xxx-1111 or xxx 1111';
    }
}
