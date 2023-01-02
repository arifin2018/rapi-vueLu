<?php

namespace App\Http\Middleware;

use Closure;
use Hashids\Hashids;
use Illuminate\Http\Request;

class HashidsDecode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('section')) {
            $decode = isset((new Hashids)->decode($request->section)[0]) ? (new Hashids)->decode($request->section)[0] : (new Hashids)->decode($request->section);
            $request->route()->setParameter('section',  $decode);
        } elseif ($request->route('subject')) {
            $decode = isset((new Hashids)->decode($request->section)[0]) ? (new Hashids)->decode($request->section)[0] : (new Hashids)->decode($request->section);
            $request->route()->setParameter('subject',  $decode);
        } elseif ($request->route('sclass')) {
            $decode = isset((new Hashids)->decode($request->section)[0]) ? (new Hashids)->decode($request->section)[0] : (new Hashids)->decode($request->section);
            $request->route()->setParameter('sclass',  $decode);
        }
        return $next($request);
    }
}
