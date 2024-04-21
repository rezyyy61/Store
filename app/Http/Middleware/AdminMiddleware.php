<?php
//
//namespace App\Http\Middleware;
//
//use Closure;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class AdminMiddleware
//{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure  $next
//     * @return mixed
//     */
//    public function handle(Request $request, Closure $next)
//    {
//        // Check if the user is authenticated
//        if (Auth::check()) {
//            // Check if the authenticated user is an admin
//            if (Auth::user()->is_admin) {
//                return $next($request);
//            }
//        }
//
//        // If not an admin or not authenticated, redirect or return an error response
//        return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
//    }
//}
