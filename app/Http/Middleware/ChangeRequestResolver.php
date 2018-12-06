<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserModel;
use Closure;

class ChangeRequestResolver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$currentUser = $request->user()) {
            $currentUser = new User();
        }
        $user = UserModel::getInstance($currentUser);
        $request->merge(['user' => $user ]);
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        return $next($request);
    }
}
