<?php

namespace App\Http\Middleware;

use Closure;

class NoCaptcha
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
        $validate = \Validator::make($request->all(), array(
            'g-recaptcha-response' => 'required|captcha'
        ));

        if ($validate->fails()){
            return response(array('error' => 'CAPTCHA Validation Failed.'),401);
        }

        return $next($request);
    }
}
