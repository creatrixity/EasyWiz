<?php
namespace App\Domains\Profile\Jobs;

use Lucid\Foundation\Job;

use App\Data\Contracts\ProfileRepositoryInterface;

class UpdateProfileJob extends Job
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
    public function handle(ProfileRepositoryInterface $profileRepository)
    {
        $profile = $profileRepository->find($this->id);

        $profile->update($this->data);

        return $profile;
    }
}
