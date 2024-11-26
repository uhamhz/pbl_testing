<?php
return [
    'GET' => [
        '/' => 'homeController@index',
        '/dashboard/{id}' => 'DashboardController@show',
        '/dashboard/admin' => 'DashboardController@dashboardAdmin',
        '/dashboard/santri' => 'DashboardController@dashboardSantri',
    ],
    'POST' => [
        '/dashboard/update' => 'DashboardController@update',
        '/register' => 'AuthController@register',
        '/login' => 'AuthController@login',
        '/logout' => 'AuthController@logout',
    ],
];