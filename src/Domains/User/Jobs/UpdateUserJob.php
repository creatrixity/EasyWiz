<?php
namespace App\Domains\User\Jobs;

use Lucid\Foundation\Job;

use App\Data\Contracts\UserRepositoryInterface;

class UpdateUserJob extends Job
{
    protected $id;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $data)
    {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRepositoryInterface $userRepository)
    {
        $user = $userRepository->find($this->id);

        $user->update($this->data);

        return $user;
    }
}
