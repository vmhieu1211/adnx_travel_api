<?php
namespace Modules\Position\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class PositionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
