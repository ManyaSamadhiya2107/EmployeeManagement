<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly {
    public function handle(Request $request, Closure $next) {
        if (!Auth::check()) {
            return redirect('/admin/login')->with('error', 'Please log in as admin first');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect('/login')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
