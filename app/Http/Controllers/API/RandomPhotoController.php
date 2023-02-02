<?php

namespace App\Http\Controllers\API;

use App\Models\Photo;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\PhotoResource;

class RandomPhotoController extends Controller
{
    public function __invoke(): PhotoResource|JsonResponse
    {
        $photo = Photo::query()->doesntHave('decision')->inRandomOrder()->first();

        if ($photo) {
            return new PhotoResource($photo);
        }

        return response()->json([
            'error' => 'There is no available Photos',
        ]);
    }
}
