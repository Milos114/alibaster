<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckEmptyValue implements Rule
{
    public $amount;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
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
        return $this->amount !== '';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The Amount field is required.';
    }
}
