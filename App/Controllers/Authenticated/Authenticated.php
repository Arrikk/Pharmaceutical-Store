<?php

namespace App\Controllers\Authenticated;

use Core\Controller;
use Core\Http\Res;

/**
 * Authenticated Controller
 */

class Authenticated extends Controller
{
    protected function before()
    {
       parent::before();
        $header = apache_request_headers();
        if (isset($header['Authorization'])) :

            $token = explode(' ', $header['Authorization']);
            $token = $token[1];
            if ($token = $this->jwt('dec', $token)) :
                $this->user = json_decode($token); 
                if(time() > $this->user->expires):
                    Res::status(400)->json(['token' => "Token Expired"]);
                endif;
            else :
                Res::status(400)->error("Invalid Token");
            endif;
        else :
            Res::status(401)->error("No Token");
        endif;
    }

    public function isUser(int $id = 0)
    {
        $id = isset($this->route_params['id']) ? (int) $this->route_params['id'] : $id; # get User id
        if ((int) $this->user->id !== $id && !$this->isAdmin() && !$this->isManager()) :
            Res::status(401)->error("Illegal Authorization"); # if not admi or another user
        else :
            return $id;
        endif;
    }

    public function requireAdmin($id = 0)
    {
        if ($this->user->authority !== ADMINISTRATOR) 
            Res::status(401)->error("Illegal Authorization Admins only"); # if not admin
    }

    public function requireManager($id = 0)
    {
        if ($this->user->authority !== MANAGER && $this->user->authority !== ADMINISTRATOR)
            Res::status(401)->error("Illegal Authorization Managers Only and Admins"); # if not Manager
    }
    public function requireCompany($id = 0)
    {
        if ($this->user->authority !== COMPANY && $this->user->authority !== MANAGER && $this->user->authority !== ADMINISTRATOR)
            Res::status(401)->error("Illegal Authorization Companies Only"); # if not Company
    }

    public function isAdmin()
    {
        return $this->user->authority == ADMINISTRATOR;
        
    }
    public function isManager()
    {
        return $this->user->authority == MANAGER;
    }
    public function isCompany()
    {
        return $this->user->authority == COMPANY;
    }
}
