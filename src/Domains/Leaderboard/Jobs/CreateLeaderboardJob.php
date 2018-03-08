<?php
namespace App\Domains\Leaderboard\Jobs;

use Lucid\Foundation\Job;

use App\Data\Contracts\LeaderboardRepositoryInterface;

class CreateLeaderboardJob extends Job
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
    public function handle(LeaderboardRepositoryInterface $leaderboard)
    {
        return $leaderboard->create($this->data);
    }
}
