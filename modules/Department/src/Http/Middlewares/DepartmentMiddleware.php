<?php
namespace Modules\Department\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class DepartmentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
