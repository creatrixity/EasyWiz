<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

use App\Domains\Team\Jobs\CreateTeamJob;

class CreateTeamFeature extends Feature
{
    public function handle(Request $request)
    {
        $team = $this->run(CreateTeamJob::class, [
            'data' => $request->input()
        ]);

        $data = [
            'team' => $team
        ];

        return response()->json($data, 200);
    }
}
