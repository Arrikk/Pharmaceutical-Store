<?php
namespace App\Controllers\Fe;

use App\Controllers\Authenticated\Admin;
use App\Models\User;
use Core\View;

class Account extends Admin
{
    public function _index()
    {
        View::draw('account/index',[
            'page' => DETAILS,
            '_authority' => $this->user->authority 
        ]);
    }

    public function _management()
    {
        View::draw('account/management', [
            '_authority' => $this->user->authority,
            '_other' => User::getUser($this->user->id)
        ]);
    }
}