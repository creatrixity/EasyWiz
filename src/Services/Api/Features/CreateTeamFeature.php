<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Domains\Team\Jobs\CreateTeamJob;
use App\Domains\Team\Jobs\ValidateTeamDataJob;

class CreateTeamFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->input();

        try {
            $this->run(ValidateTeamDataJob::class, [
                'data' => $data
            ]);

            $team = $this->run(CreateTeamJob::class, [
                'data' => $data
            ]);

            $response = [
                'team' => $team
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
