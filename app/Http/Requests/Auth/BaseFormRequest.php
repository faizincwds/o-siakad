<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $data = [];

        foreach ($this->all() as $key => $value) {
            if (is_string($value)) {
                $data[$key] = trim($value);
            }
        }

        $this->merge($data);
    }
}
