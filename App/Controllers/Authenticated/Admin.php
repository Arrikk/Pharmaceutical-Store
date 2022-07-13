<?php

namespace App\Controllers\Authenticated;

use App\Auth;
use Core\Controller;
use Core\Http\Res;
use Core\View;

/**
 * Authenticated Controller
 */

class Admin extends Controller
{
    protected function before()
    {
       parent::before();
        if (isset($_SESSION['token'])) :
            $token = $_SESSION['token'];
            if ($token = $this->jwt('dec', $token)) :
                $this->user = json_decode($token);
                // if(!$this->user->is_admin){
                //     Auth::logout();
                //     $this->redirect('/login');
                // }
                if(time() > $this->user->expires):
                    Auth::logout();
                    $this->redirectWithUrl();
                endif;
                else :
                    Auth::logout();
                $this->redirectWithUrl();
            endif;
        else :
            View::render('auth/login.html', [
                'title' => 'Leviplatte Admin Login'
            ]);
            return false;
        endif;
    }

    public function redirectWithUrl()
    {
        Auth::rememberRequestedPage();
        $this->redirect('/login');
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
}
