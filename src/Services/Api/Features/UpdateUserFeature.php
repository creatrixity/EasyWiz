<?php
namespace App\Services\Api\Features;

use Lucid\Foundation\Feature;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

use Framework\User;
use Auth;

use App\Domains\User\Jobs\UpdateUserJob;
use App\Domains\User\Jobs\ValidateUserDataJob;

class UpdateUserFeature extends Feature
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(Request $request)
    {
        $user = User::find($this->id);

        if (Auth::user()->cant('update', $user)) {
            $response = [
                'message' => "Oops! You don't have sufficient permissions to execute this action"
            ];

            return response()->json($response, 403);
        }

        try
        {
            $data = $request->input();

            $this->run(ValidateUserDataJob::class, [
                'data' => $data
            ]);

            try
            {
                $user = $this->run(UpdateUserJob::class, [
                    'id' => $this->id,
                    'data' => $data
                ]);

                $response = [
                    'message' => 'Your information was successfully updated',
                    'user' => $user
                ];

                return response()->json($response, 200);

            } catch (ModelNotFoundException $e) {
                $response = [
                    'message' => 'We could not find any user matching this parameters.'
                ];

                return response()->json($response, 404);
            }

        } catch(ValidationException $e) {
            $response = [
                'errors' => $e->validator->messages(),
            ];

            return response()->json($response, 403);
        }

    }
}
