<?php

namespace App\Foundation;

use Lucid\Foundation\Validation;
use Lucid\Foundation\InvalidInputException;
use Illuminate\Validation\ValidationException;

/**
 * Base Validator class, to be extended by specific validators.
 * Decorates the process of validating input. Simply declare
 * the $rules and call validate($attributes) and you have an
 * \Illuminate\Validation\Validator instance.
 */
class AppValidator
{
    protected $rules = [];
    protected $messages = [];

    protected $validation;

    public function __construct(Validation $validation)
    {
        $this->validation = $validation;
    }

    /**
     * Validate the given input.
     *
     * @param array $input The input to validate
     * @param array $rules Specify custom rules (will override class rules)
     *
     * @return bool
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate($input, array $rules = [])
    {
        $validation = $this->validation($input, $rules);

        if ($validation->fails()) {
            throw new ValidationException($validation);
        }

        return true;
    }

    /**
     * Get a validation instance out of the given input and optional additional rules.
     * By default the $rules array will be used.
     *
     * @param array $input
     * @param array $rules
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validation($input, array $rules = [])
    {
        if (empty($rules)) {
            $rules = $this->rules;
        }

        if (empty($messages)) {
            $messages = $this->messages;
        }

        return $this->validation->make($input, $rules, $messages);
    }
}
