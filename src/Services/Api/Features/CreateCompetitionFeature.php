<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

use App\Domains\Competition\Jobs\CreateCompetitionJob;

class CreateCompetitionFeature extends Feature
{
    public function handle(Request $request)
    {
        $competition = $this->run(CreateCompetitionJob::class, [
            'data' => $request->input()
        ]);

        $data = [
            'competition' => $competition
        ];

        return response()->json($data, 200);
    }
}
