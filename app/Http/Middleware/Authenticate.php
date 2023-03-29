<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
            if(isset($request->hash) && isset($request->expires) && isset($request->signature)){
                return route('verification.verify',['id'=>$request->id,'hash' => $request->hash,'expires'=>$request->expires,'signature'=>$request->signature]);
            }
            return route('login',['to'=>url()->current()]);
        }
    }
}
