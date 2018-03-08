<?php

namespace App\Data\Repositories;

use Framework\Competition;

use App\Data\Contracts\CompetitionRepositoryInterface;

class EloquentCompetitionRepository extends Repository implements CompetitionRepositoryInterface
{
    public $model;

    public function __construct ()
    {
        $this->model = new Competition;

        parent::__construct($this->model);
    }
}
