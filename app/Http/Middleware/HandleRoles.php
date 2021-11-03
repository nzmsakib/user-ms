<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandleRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Auth::user()->id;
        $role = User::find($id)->role->title;
        switch ($role) {
            case 'Admin':
                return redirect()->route('manage.dashboard');
                break;
            
            default:
                return redirect()->route('webroot');
                break;
        }
    }
}
