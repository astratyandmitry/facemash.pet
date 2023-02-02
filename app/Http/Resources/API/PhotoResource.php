<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Photo
 */
class PhotoResource extends JsonResource
{
    public static $wrap = 'photo';

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'external_id' => $this->external_id,
            'image_url' => $this->image_url,
        ];
    }
}
