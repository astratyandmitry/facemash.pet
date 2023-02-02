<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $photo_id
 * @property string $ip
 * @property boolean $approved
 * @property integer|null $deleted_by_id
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 *
 * @property \App\Models\Photo $photo
 * @property \App\Models\Admin|null $deleted_by
 */
class Decision extends Model
{
    use SoftDeletes;

    protected $fillable = ['ip', 'approved'];

    protected $casts = [
        'photo_id' => 'integer',
        'approved' => 'boolean',
    ];

    public $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Photo::class);
    }

    public function deleted_by(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'deleted_by_id');
    }
}
