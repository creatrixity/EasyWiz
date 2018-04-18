<?php
namespace App\Domains\User\Jobs;

use Lucid\Foundation\Job;

use App\Domains\User\Validators\UserValidator;

class ValidateUserDataJob extends Job
{
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserValidator $userValidator)
    {
        return $userValidator->validate($this->data);
    }
}
