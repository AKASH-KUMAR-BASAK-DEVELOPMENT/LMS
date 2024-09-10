<?php

namespace App\Http\Middleware;

use App\Models\VisitorModel;
use Closure;
use Illuminate\Http\Request;

class BlockIPMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $clientIP = $request->ip();
        $visitor = VisitorModel::where('ip', $clientIP)->first();
        if ($visitor && $visitor->is_block) {
            abort(403, 'Unauthorized action. Your IP is blocked.');
        }
        return $next($request);
    }
}
