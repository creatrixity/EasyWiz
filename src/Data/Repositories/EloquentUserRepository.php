<?php

namespace App\Data\Repositories;

use Framework\User;

use App\Data\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends Repository implements UserRepositoryInterface
{
    public $model;

    public function __construct ()
    {
        $this->model = new User;

        parent::__construct($this->model);
    }
}
