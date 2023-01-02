<?php

namespace App\Http\Middleware;

use Closure;
use Hashids\Hashids;
use Illuminate\Http\Request;

class HashidsEncode
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
        if ($request->route('section') && is_numeric($request->route('section'))) {
            $encode = (new Hashids)->encode($request->section);
            $request->route()->setParameter('section',  $encode);
        } elseif ($request->route('subject') && is_numeric($request->route('subject'))) {
            $encode = (new Hashids)->encode($request->section);
            $request->route()->setParameter('subject',  $encode);
        } elseif ($request->route('sclass') && is_numeric($request->route('sclass'))) {
            $encode = (new Hashids)->encode($request->section);
            $request->route()->setParameter('sclass',  $encode);
        }

        return $next($request);
    }
}
