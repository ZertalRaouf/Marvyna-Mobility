<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if( $request->is('admin*')){
                return route('admin.login.form');
            }
            if( $request->is('user*')){
                return route('user.login.form');
            }
            return route('login');
        }
    }
}
