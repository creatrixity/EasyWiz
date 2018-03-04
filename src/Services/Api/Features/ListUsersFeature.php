<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;

use App\Domains\User\Jobs\FetchUsersJob;

class ListUsersFeature extends Feature
{
    public function handle(Request $request)
    {
        $data = $this->run(FetchUsersJob::class);

        return response()->json([
            'data'  =>  $data
        ]);

    }
}
