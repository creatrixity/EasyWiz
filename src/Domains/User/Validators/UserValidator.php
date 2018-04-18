<?php
namespace App\Domains\User\Validators;

use App\Foundation\AppValidator;

/**
 * Validates user information.
 */
class UserValidator extends AppValidator
{
    protected $rules = [
        'name' => 'required',
        'display_name' => 'required|min:3',
        'photo' => 'alpha_dash',
        'birth_year' => 'required|integer',
        'email' => 'required|email',
    ];
}
