<?php
namespace App\Domains\Leaderboard\Jobs;

use Lucid\Foundation\Job;

use App\Domains\Team\Validators\LeaderboardValidator;

class ValidateLeaderboardDataJob extends Job
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
    public function handle(LeaderboardValidator $leaderboardValidator)
    {
        return $leaderboardValidator->validate($this->data);
    }
}
