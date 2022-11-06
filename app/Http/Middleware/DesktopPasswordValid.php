<?php

namespace App\Http\Middleware;

use App\DesktopPassword;
use App\Http\Controllers\Auth\DesktopPasswordController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DesktopPasswordValid
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
        $user = auth()->user();
        $user_role = DB::select('select role_id from role_user where user_id = ?', [$user->id]);
        
        if($user_role[0]->role_id == 1){
            return $next($request);
        }
        else {            
            if ($request->session()->has('desktop_token')) {
                return $next($request);
            }
            else {
                abort(403);
            }

        }
    }
}
