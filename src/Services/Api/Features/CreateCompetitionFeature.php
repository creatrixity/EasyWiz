<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Domains\Competition\Jobs\CreateCompetitionJob;
use App\Domains\Team\Jobs\ValidateCompetitionDataJob;

class CreateCompetitionFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $request->input();

        try {
            $this->run(ValidateCompetitionDataJob::class, [
                'data' => $data
            ]);

            $competition = $this->run(CreateCompetitionJob::class, [
                'data' => $data
            ]);

            $response = [
                'competition' => $competition
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
