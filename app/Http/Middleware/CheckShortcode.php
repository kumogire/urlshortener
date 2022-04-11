<?php

namespace App\Http\Middleware;

use App\Models\ShortenedUrl;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CheckShortcode
{
    /**
     * Handle an incoming request.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // If the third segment of the URL matches a value in the database, redirect
        $segment = explode("/", $request->url());

        // Check to see if there is a 3rd segment
        if(isset($segment[3])){
            $longurl = ShortenedUrl::whereShortcode($segment[3])->first();
        }else{
            $longurl = "";
        }

        if ($longurl) {
            return redirect()->away($longurl->url);
        } else {
            return $next($request);
        }
    }
}
