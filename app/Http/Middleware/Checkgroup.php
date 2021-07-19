<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkgroup
{

    public function handle($request, Closure $next)
    {
        if (\Auth::user()->group == 1 
            || \Auth::user()->group == 2
            || \Auth::user()->group == 3
            || \Auth::user()->group == 4
            || \Auth::user()->group == 5
            || \Auth::user()->group == 6) {
            return $next($request);
        }

        return redirect('/'); // If user is not an admin.
    }
}
