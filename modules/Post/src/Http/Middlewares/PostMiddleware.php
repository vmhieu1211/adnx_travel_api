<?php
namespace Modules\Post\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class PostMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
