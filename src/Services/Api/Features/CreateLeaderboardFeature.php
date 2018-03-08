<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

use App\Domains\Leaderboard\Jobs\CreateLeaderboardJob;

class CreateLeaderboardFeature extends Feature
{
    public function handle(Request $request)
    {
        $leaderboard = $this->run(CreateLeaderboardJob::class, [
            'data' => $request->input()
        ]);

        $data = [
            'leaderboard' => $leaderboard
        ];

        return response()->json($data, 200);
    }
}
