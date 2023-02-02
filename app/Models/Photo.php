<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $external_id
 * @property string $image_url
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Decision|null $decision
 */
class Photo extends Model
{
    protected $fillable = ['external_id'];

    public function decision(): HasOne
    {
        return $this->hasOne(Decision::class);
    }

    public function getImageUrlAttribute(): string
    {
        return "https://picsum.photos/id/{$this->external_id}/800/600";
    }
}
