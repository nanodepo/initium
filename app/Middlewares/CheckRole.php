<?php

namespace App\Middlewares;

use Closure;
use App\Domains\User\Enums\MemberRole;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $roles = empty($roles) ? [] : $roles;

        if (array_any($roles, fn($role) => $request->user()->hasRole(MemberRole::from($role)))) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
