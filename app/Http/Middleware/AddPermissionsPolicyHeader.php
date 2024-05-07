<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddPermissionsPolicyHeader
{
    
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header('Permissions-Policy', 'ch-ua-form-factor');

        return $response;
    }
}
