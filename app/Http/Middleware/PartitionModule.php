<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PartitionModule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->getPathInfo();
        $module = '';
        if (preg_match("/\/(\w[^\/]+)/", $path, $match)) {
            $module = $match[1];
        }
        $request->offsetSet('module', $module);
        return $next($request);
    }
}
