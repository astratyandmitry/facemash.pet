<?php

namespace App\Http\Controllers\Admin;

use App\Models\Decision;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DecisionsDeleteController extends Controller
{
    public function __invoke(int $id): RedirectResponse
    {
        /** @var \App\Models\Decision $decision */
        $decision = Decision::query()->findOrFail($id);
        $decision->deleted_by_id = auth()->id();
        $decision->deleted_at = now();
        $decision->save();

        return redirect()->route('admin.decisions.list')
            ->with('status', 'deleted');
    }
}
