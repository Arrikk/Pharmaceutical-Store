<?php

namespace App\Controllers;

use App\Controllers\Authenticated\Authenticated;
use App\Helpers\Format;
use App\Models\User as ModelsUser;
use Core\Http\Res;
use Core\View;

class User extends Authenticated
{
    public function index()
    {
        Res::send("<pre>
        ---
        title: PHARMACY MGT API
        slug: Web/API/PHARMACY MGT_API
        page-type: web-api-overview
        tags:
          - API
          - PHARMACY MGT API
          - Reference
          - Landing
          - Experimental
          - Active
          - Standard
        ---
        </pre>");
    }

    public function login($data)
    {
     
        extract( (array) $data);
        $login = $login ?? '';
        $password = $password ?? '';
        
        $this->requires([
            'login' => "$login || string",
            'password' => "$password || any"
        ]);

        if ($user = ModelsUser::authenticate($login, $password)) :
            $token = $this->jwt('enc', json_encode([
                'id' => (int) $user->id,
                'authority' => (string) $user->authority,
                'expires' => time() + 60 * 60 * 24
            ]));
            Res::json(['token' => $token]);
        else :
            Res::send($user);
        endif;
    }

    public function _users($data)
    {
        $this->isAdmin();
        $users = ModelsUser::users($this->user->id, $data);
        Res::json($users);
    }

    public function user($data)
    {
        $this->required(['user' => $data->user ?? '']);
        $user = ModelsUser::getUserById($data->user);
        Res::json(Format::data($user));
    }


    public function _update($update)
    {
        // Res::json($update);

        $id = $this->_isUser();
        if (!isset($update->withToken)) :
            if (
                isset($update->is_admin)
                || isset($update->is_verified)
                || isset($update->is_active)
                || isset($update->email)
            ) :
                Res::status(400)->json(['error' => 'Some fields needs an additional Informations']);
            endif;
            Res::json(ModelsUser::updateUser($id, $update)); # Update if is user and is admin
        else :
            Res::json(['message' => "Development in pregress"]);
        # update with token
        endif;
    }

    public function _delete()
    {
        $id = $this->isUser();
        Res::json(ModelsUser::deleteUser($id));
    }

    public function exists($user)
    {
        if (!isset($user->check))
            Res::status(400)->json(['error' => 'Provide email or username to check']);
        Res::json(['exists' => ModelsUser::userExists($user->check)]);
    }
}
