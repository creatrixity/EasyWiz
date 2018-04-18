<?php
namespace App\Domains\Team\Jobs;

use Lucid\Foundation\Job;

use App\Domains\Team\Validators\TeamValidator;

class ValidateTeamDataJob extends Job
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
    public function handle(TeamValidator $teamValidator)
    {
        return $teamValidator->validate($this->data);
    }
}
