<?php
namespace App\Helpers;

class Menu
{
    public static function admin()
    {
        return [
            'Registered Companies' => [
                'link' => '/companies',
                'icon' => 'icon ni ni-briefcase',
                'other' => ''
            ],
            'Approved Companies' => [
                'link' => '/approved',
                'icon' => 'icon ni ni-linux-server',
                'other' => ''
            ],
            'Setting' => [
                'icon' => 'icon ni ni-setting-alt',
                'link' => '/account/management',
                'other' => ''
            ],
            'Logout' => [
                'icon' => 'icon ni ni-signout',
                'link' => '/auth/logout',
                'other' => ''
            ],
        ];
    }
    public static function company()
    {
        return [
            // 'Account Information' => [
            //     'link' => '',
            //     'icon' => 'icon ni ni-account-setting',
            //     'other' => ''
            // ],
            'Pharmaceutical Managers' => [
                'icon' => 'icon ni ni-users-fill',
                'link' => '/managers',
                'other' => ''
            ],
            'Supply Management' => [
                'icon' => 'icon ni ni-notes-alt',
                'link' => '/supply',
                'other' => ''
            ],
            'Setting' => [
                'icon' => 'icon ni ni-setting-alt',
                'link' => '/account/management',
                'other' => ''
            ],
            'Logout' => [
                'icon' => 'icon ni ni-signout',
                'link' => '/auth/logout',
                'other' => ''
            ],
        ];
    }
    public static function manager()
    {
        return [
            'Product Management' => [
                'icon' => 'icon ni ni-notes-alt',
                'link' => '',
                'other' => ''
            ],
            'Setting' => [
                'icon' => 'icon ni ni-setting-alt',
                'link' => '/account/management',
                'other' => ''
            ],
            'Logout' => [
                'icon' => 'icon ni ni-signout',
                'link' => '/auth/logout',
                'other' => ''
            ],
        ];
    }
}