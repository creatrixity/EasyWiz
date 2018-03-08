<?php
namespace App\Domains\Team\Jobs;

use Lucid\Foundation\Job;

use App\Data\Contracts\TeamRepositoryInterface;

class CreateTeamJob extends Job
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
    public function handle(TeamRepositoryInterface $team)
    {
        return $team->create($this->data);
    }
}
