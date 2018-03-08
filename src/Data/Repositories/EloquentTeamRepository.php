<?php

namespace App\Data\Repositories;

use Framework\Team;

use App\Data\Contracts\TeamRepositoryInterface;

class EloquentTeamRepository extends Repository implements TeamRepositoryInterface
{
    public $model;

    public function __construct ()
    {
        $this->model = new Team;

        parent::__construct($this->model);
    }
}
