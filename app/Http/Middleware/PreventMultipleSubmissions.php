<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class PreventMultipleSubmissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->input('_token');

        // Check if the token exists in the cache
        if (Cache::has($token)) {
            return redirect()->back()->withErrors(['error' => 'Form ini sudah dikirim.']);
        }

        // Store the token in the cache for 5 seconds
        Cache::put($token, true, 5);

        return $next($request);
    }
}
