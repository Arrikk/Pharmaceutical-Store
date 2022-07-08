<?php
namespace App\Helpers;

class Menu
{
    public static function admin()
    {
        return [
            'Account Management' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Pharmaceutical Companies' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Pharmaceutical Managers' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Product Management' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Setting' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Logout' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
        ];
    }
    public static function company()
    {
        return [
            'Account Information' => [
                'link' => '',
                'icon' => 'icon ni ni-account-setting',
                'other' => ''
            ],
            'Pharmaceutical Managers' => [
                'icon' => 'icon ni ni-users-fill',
                'link' => '',
                'other' => ''
            ],
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
    public static function manager()
    {
        return [
            'Account Information' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Pharmaceutical Managers' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Product Management' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Setting' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
            'Logout' => [
                'link' => '',
                'icon' => '',
                'other' => ''
            ],
        ];
    }
}