<?php

namespace App\Http\Controllers\API;

use App\Models\Photo;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\PhotoDecisionRequest;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class PhotoDecisionController extends Controller
{
    public function __invoke(int $id, PhotoDecisionRequest $request): Response
    {
        /** @var \App\Models\Photo $photo */
        $photo = Photo::query()->doesntHave('decision')->findOrFail($id);
        $photo->decision()->create([
            'approved' => $request->type == 'approve',
            'ip' => $request->ip(),
        ]);

        return response()->noContent(HttpResponse::HTTP_ACCEPTED);
    }
}
