<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckHostSubscription
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
        $user = Auth::guard(Auth::getDefaultDriver())->user();
        // /dd($user);
        $subCreated = $user->activeSubscription();
        if($subCreated){
            return $next($request);
        }else{
            return redirect()->route('subscribePage')->with(['status' => 'Success' , 'message'=>'Kindly choose subscription first!']);
        }
    }
}

