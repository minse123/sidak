<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VeryisSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $superAdminId = Role::query()
            ->where('role_name', 'superadmin')
            ->value('id');

        if ($user === null || $superAdminId === null || (int) $user->role_id !== (int) $superAdminId) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
