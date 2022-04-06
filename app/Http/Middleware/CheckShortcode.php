<?php

namespace App\Http\Middleware;

use App\Models\ShortenedUrl;
use Closure;
use Illuminate\Http\Request;

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
        $url = ShortenedUrl::whereShortcode($request)->first();

        if ($url) {
            return redirect()::away($url);
        } else {
            return redirect('home');
        }
    }
}
