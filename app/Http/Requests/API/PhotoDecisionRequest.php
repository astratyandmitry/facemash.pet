<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $type
 */
class PhotoDecisionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|in:approve,deny',
        ];
    }
}
