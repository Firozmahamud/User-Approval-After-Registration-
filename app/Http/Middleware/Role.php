<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// class Role
// {

//     public function handle(Request $request, Closure $next)
//     {
//         return $next($request);
//     }
// }



namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, String $role) {
    if (!Auth::check()) // This isn't necessary, it should be part of your 'auth' middleware
      return redirect('/home');

    $user = Auth::user();
    if($user->role == $role)
      return $next($request);

    return redirect('/home');
  }
}
