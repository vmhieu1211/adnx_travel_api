<?php
namespace Modules\Request\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class RequestMiddleware 
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
