<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Domains\Leaderboard\Jobs\CreateLeaderboardJob;
use App\Domains\Leaderboard\Jobs\ValidateLeaderboardDataJob;

class CreateLeaderboardFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->input();

        try {
            $leaderboard = $this->run(CreateLeaderboardJob::class, [
                'data' => $data
            ]);

            $response = [
                'leaderboard' => $leaderboard
            ];

            return response()->json($response, 200);

        } catch (ValidationException $e) {
            $response = [
                'errors' => $e->validator->messages(),
            ];

            return response()->json($response, 403);
        }
    }
}
