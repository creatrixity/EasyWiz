<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Domains\User\Jobs\UpdateProfileJob;

class UpdateProfileFeature extends Feature
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        try
        {
            $user = $this->run(UpdateProfileJob::class, [
                'id' => $this->id,
                'data' => $request->input()
            ]);

            $data = [
                'message' => 'Your profile was successfully updated',
                'user' => $user
            ];

            return response()->json($data, 200);

        } catch (ModelNotFoundException $e) {
            $data = [
                'message' => 'We could not find any profile matching this parameters.'
            ];

            return response()->json($data, 404);
        }
    }
}
