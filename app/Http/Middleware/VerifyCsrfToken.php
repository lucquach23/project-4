<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Str;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    
    // protected function tokensMatch($request)
    // {
    //     $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
    
    //     if (! $token && $header = $request->header('X-XSRF-TOKEN')) {
    //         $token = $this->encrypter->decrypt($header);
    //     }
    
    //     return Str::equals($request->session()->token(), $token);
    // }
    protected $except = [
        //
    ];
}
