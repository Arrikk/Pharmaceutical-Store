<?php

namespace App\Controllers;

use App\Controllers\Authenticated\Authenticated;
use App\Models\Settings\Settings;
use App\Models\User;
use App\Models\User\Followers;
use Core\Http\Res;
use Module\Image;

class Profile extends Authenticated
{
    public function _profile()
    {
    }

    public function _update($update)
    {
        extract((array) $update);
        $password = $password ?? '';
        $login = $login ?? '';
        $authority = $authority ?? '';
        $id = $id ?? '';

        $this->requires(['id' => "$id || int"]);
        // $this->isUser($id);

        // Res::json($this->isCompany());

        if (!$this->isAdmin() && !$this->isCompany()) $authority = "";
        Res::json(User::updateUser($id, [
            'password_hash' => $password,
            'username' => $username,
            "authority" => $authority
        ]));
    }


    public function _information()
    {
        Res::json(User::getUser($this->user->id));
    }

    public function upload($id, $data)
    {

        // Res::json($_FILES['image']);
        // Res::json(is_array($_FILES['image']));

        Res::json(Image::multiple($_FILES));
    }
}
