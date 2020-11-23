<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Sidebar configuration
    |--------------------------------------------------------------------------
    |
    | Use this configuration format for a static sidebar menu by adding or
    | removing items. This config is loaded from
    | Http\ViewComposers\SidebarViewComposer.php
    | In that file you can change how to get the sidebar menu configuration,
    | instead of using a static file, you can use a Model to obtain the
    | menu items dinamically from database applying own business logic.
    |
    */
    [
        'text' => 'Menu Utama',
        'heading' => true,
        'translate' => 'sidebar.heading.HEADER'
    ],
    [
        'role' => '1',
        'text' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'icon-speedometer',
        'alert' => '3'
    ],
    [
        'role' => '1',
        'text' => 'Paseban',
        'route' => 'profile',
        'icon' => 'fas fa-warehouse',
        'alert' => '30'
    ],
    [
        'role' => '1',
        'text' => 'Batik',
        'route' => 'batik',
        'icon' => 'fab fa-envira',
        'alert' => '30'
    ]
];
