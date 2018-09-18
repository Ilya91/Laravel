<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('MyNavBar', function ($menu) {
            //$menu->add('Home', ['route' => '/home', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Learn', ['route' => 'learn', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Realtime', ['route' => 'realtime', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
            $menu->add('Login', ['route' => 'login', 'class' => 'nav-item'])->link->attr(['class' => 'nav-link']);
        });

        return $next($request);
    }
}
