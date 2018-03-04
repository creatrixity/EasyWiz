<?php
namespace App\Domains\User\Jobs;

use Lucid\Foundation\Job;

use App\Data\Contracts\UserRepositoryInterface;

class FetchUsersJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepositoryInterface $user)
    {
        return $user->all();
    }
}
