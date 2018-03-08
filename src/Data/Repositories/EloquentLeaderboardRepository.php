<?php

namespace App\Data\Repositories;

use Framework\Leaderboard;

use App\Data\Contracts\LeaderboardRepositoryInterface;

class EloquentLeaderboardRepository extends Repository implements LeaderboardRepositoryInterface
{
    public $model;

    public function __construct ()
    {
        $this->model = new Leaderboard;

        parent::__construct($this->model);
    }
}
