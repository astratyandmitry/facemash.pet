<?php

namespace App\Http\Controllers\Admin;

use App\Models\Decision;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class DecisionsListController extends Controller
{
    public function __invoke(): View
    {
        $decisions = Decision::query()->with('photo')->paginate(5);

        return view('admin.decisions', [
            'decisions' => $decisions,
        ]);
    }
}
