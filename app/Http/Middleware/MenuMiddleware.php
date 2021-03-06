<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Menu;

class MenuMiddleware
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
        if(!Auth::check()) return $next($request);

        $user = Auth::user();

        Menu::create('navbar', function($menu) use($user) {

            $menu->style('ubold');

            $attr = ['icon' => 'fa fa-dot-circle-o'];

            $menu->url('administrator/home', 'Dashboard', ['icon' => 'fa fa-home']);

            $menu->dropdown('Users', function ($sub) use($user,$attr) {
                $sub->url('administrator/users/all', 'All User', $attr);
                $sub->url('administrator/role/users', 'Roles', $attr);
                $sub->url('administrator/permission/users', 'Permissions', $attr);
            }, ['icon' => 'fa fa-users']);

            $menu->dropdown('Managements', function ($sub) use($user,$attr) {
                $sub->url('administrator/management/post', 'Post', $attr);
                $sub->url('administrator/management/category', 'Category', $attr);
                $sub->url('administrator/management/tag', 'Tag', $attr);
            }, ['icon' => 'fa fa-archive']);

            $menu->dropdown('Settings', function ($sub) use($user,$attr) {
                $sub->url('administrator/settings/general', 'General', $attr);
                $sub->url('administrator/settings/writing', 'Writing', $attr);
                $sub->url('administrator/settings/reading', 'Reading', $attr);
                $sub->url('administrator/settings/discussion', 'Discussion', $attr);
            }, ['icon' => 'fa fa-cogs']);

            $menu->url('administrator/medias', 'Media', ['icon' => 'fa fa-image']);

            $menu->url('administrator/comments', 'Comments', ['icon' => 'fa fa-commenting']);

            $menu->url('administrator/templates', 'Template', ['icon' => 'fa fa-paint-brush']);

        });

        return $next($request);
    }
}
