<?php
namespace App\Domains\Competition\Jobs;

use Lucid\Foundation\Job;

use App\Domains\Competition\Validators\CompetitionValidator;

class ValidateCompetitionDataJob extends Job
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
    public function handle(CompetitionValidator $competitionValidator)
    {
        $competitionValidator->validate($this->data);
    }
}
