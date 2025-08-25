<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request; use Symfony\Component\HttpFoundation\Response;
class EnsureUserIsAdmin {
    public function handle(Request $request, Closure $next): Response {
        if (!auth()->check() || (auth()->user()->role ?? null) !== 'admin') abort(403,'Admins only.');
        return $next($request);
    }
}
