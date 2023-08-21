<?php
namespace Modules\Customer\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
