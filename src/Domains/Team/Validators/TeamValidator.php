<?php

namespace App\Domains\Team\Validators;

use App\Foundation\AppValidator;

class TeamValidator extends AppValidator {

    protected $rules = [
        'title'  =>  'required',
        'alias' =>  'required',
        'artwork' => 'alpha_dash'
    ];
}
