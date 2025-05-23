<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailOrPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value is a valid email
         // Check if the value is a valid email
         if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        // Check if the value is a valid phone number
        if (!preg_match('/^7\d{8}$/', $value)) {
            $fail('يجب أن يكون :attribute عنوان بريد إلكتروني صالح أو رقم هاتف يبدأ بـ 7 ويتكون من 9 أرقام.');
        }
    }
}
