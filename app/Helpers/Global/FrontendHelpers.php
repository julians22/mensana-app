<?php

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Default App');
    }
}

if (! function_exists('activeClass')) {
    /**
     * Helper to grab the active class for the navigation links.
     *
     * @param  string  $route
     * @return string
     */
    function activeClass($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
