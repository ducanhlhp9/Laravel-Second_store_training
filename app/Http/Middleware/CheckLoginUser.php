<?php


namespace App\Http\Middleware;

use Closure;
class CheckLoginUser
{
    public function handle($request, Closure $next){
        return response()->json(['redirect'=> route('get.login')]);
    }
}
