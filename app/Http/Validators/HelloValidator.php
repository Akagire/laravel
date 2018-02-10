<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    /* ルール:hallo */
    public function validateHello($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }

    /* ルール:even */
    public function validateEven($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }

    /* ルール:odd */
    public function validateOdd($attribute, $value, $parameters)
    {
        return $value % 2 == 1;
    }
}
