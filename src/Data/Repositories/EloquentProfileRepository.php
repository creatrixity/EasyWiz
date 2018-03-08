<?php

namespace App\Data\Repositories;

use Framework\Profile;

use App\Data\Contracts\ProfileRepositoryInterface;

class EloquentProfileRepository extends Repository implements ProfileRepositoryInterface
{
    public $model;

    public function __construct ()
    {
        $this->model = new Profile;

        parent::__construct($this->model);
    }
}
