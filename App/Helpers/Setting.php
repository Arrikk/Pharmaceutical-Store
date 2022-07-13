<?php
namespace App\Helpers;
class Setting
{
    public static function App()
    {
        return (object) [
            'name' => "BRUIZ",
            'logo' => '',
            'slug' => '',
            'title' => '',
            'url' => '/'
        ];
    }
}