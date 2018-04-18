<?php

namespace App\Domains\Leaderboard\Validators;

use App\Foundation\AppValidator;

class LeaderboardValidator extends AppValidator {

    protected $rules = [
        'title'  =>  'required',
        'alias' =>  'required',
    ];
}
