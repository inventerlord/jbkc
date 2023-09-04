<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGate
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
        if (!app()->runningInConsole() && Auth::check()) {
            $roles = Role::with('permissions')->get();


            foreach ($roles as $role) {
                foreach ($role->permissions as $permision) {
                    $permissionArray[$permision->name][] = $role->id;
                }
            }

            foreach ($permissionArray as $title => $roleIds) {
                Gate::define($title, function (User $user) use ($roleIds) {
                    return count(array_intersect((array) $user->role->id, $roleIds)) > 0;
                });
            }
        }

        return $next($request);
    }
}
