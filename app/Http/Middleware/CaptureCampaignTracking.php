<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Capture ad campaign click parameters into the visitor's own session.
 *
 * Runs on every web request so the values survive whichever page the visitor
 * happens to land on first, but only the first request that actually carries
 * them writes anything - later pages never overwrite the stored values.
 */
class CaptureCampaignTracking
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET')) {
            cosmic_capture_tracking($request);
        }

        return $next($request);
    }
}
