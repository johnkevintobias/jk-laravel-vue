<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class FormValidationService
{
    public function validate(array $data, array $rules)
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return $validator->errors();
        }

        return null; // Validation passed
    }
}
