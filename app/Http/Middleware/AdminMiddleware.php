<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest() || $request->query('token')) {
            if (! $token = $request->query('token')) {
                return redirect()->to('/');
            }

            /** @var \App\Models\Admin $admin */
            if (! $admin = Admin::query()->where('token', $token)->first()) {
                return redirect()->to('/');
            }

            auth()->loginUsingId($admin->id);
        }

        return $next($request);
    }
}
