<?php

namespace App\Helpers;

class ThemeUI
{
    public static function getData()
    {
        return [
            /* ─── Menu Definition ─── */
            'menuItems' => [
                [
                    'route'      => 'dashboard',
                    'icon'       => 'dashboard',
                    'label'      => 'Dashboard',
                    'permission' => null // Allowed for all
                ],
                [
                    'key'      => 'settings',
                    'icon'     => 'settings',
                    'label'    => 'Settings',
                    'children' => [
                        [
                            'route' => 'settings.index',
                            'label' => 'Pengaturan'
                        ],
                        [
                            'route' => 'settings.profile',
                            'label' => 'Profil'
                        ],
                    ]
                ],
            ],

            /* ─── Page Meta ─── */
            'pageMeta' => [
                'dashboard'      => [
                    'icon'   => 'dashboard',
                    'title'  => 'Dashboard',
                    'desc'   => 'Ringkasan informasi penting',
                    'crumbs' => ['Dashboard']
                ],
                'settings.index' => [
                    'icon'   => 'settings',
                    'title'  => 'Pengaturan Sistem',
                    'desc'   => 'Konfigurasi aplikasi dan akun',
                    'crumbs' => ['Settings', 'Pengaturan']
                ],
                'settings.profile' => [
                    'icon'   => 'person',
                    'title'  => 'Profil Perguruan Tinggi',
                    'desc'   => 'Kelola informasi profil Anda',
                    'crumbs' => ['Settings', 'Profil']
                ],
            ],

            /* ─── Theme Options ─── */
            'themeOpts' => [
                ['id' => 'light', 'icon' => 'light_mode', 'label' => 'Light'],
                ['id' => 'dark',  'icon' => 'dark_mode',  'label' => 'Dark'],
            ]
        ];
    }

    /**
     * Find a specific menu item by its route name.
     */
    public static function findMenuByRoute(?string $routeName)
    {
        if (!$routeName) {
            return null;
        }

        $menus = static::getData()['menuItems'];

        foreach ($menus as $menu) {
            // Single menu (without children)
            if (isset($menu['route']) && $menu['route'] === $routeName) {
                return $menu;
            }

            // Parent menu with children
            if (!empty($menu['children'])) {
                foreach ($menu['children'] as $child) {
                    if (isset($child['route']) && $child['route'] === $routeName) {
                        return $child;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Get page meta data directly from a route name.
     */
    public static function getMetaFromRoute(?string $routeName)
    {
        if (!$routeName) {
            return null;
        }

        // Langsung ambil dari pageMeta berdasarkan routeName
        return static::getData()['pageMeta'][$routeName] ?? null;
    }
}
