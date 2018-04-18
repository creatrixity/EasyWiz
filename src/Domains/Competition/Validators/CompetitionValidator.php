<?php

namespace App\Domains\Competition\Validators;

use App\Foundation\AppValidator;

class CompetitionValidator extends AppValidator {

    protected $rules = [
        'title'  =>  'required',
        'alias' =>  'required',
    ];
}
