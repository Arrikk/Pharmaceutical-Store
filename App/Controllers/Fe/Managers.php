<?php
namespace App\Controllers\Fe;

use App\Controllers\Authenticated\Admin;
use App\Controllers\Authenticated\Authenticated;
use App\Helpers\Menu;
use App\Models\User;
use Core\View;

class Managers extends Admin
{
    public function _manage()
    {
        $this->requireCompany();
        View::draw('managers/index', [
            '_authority' => $this->user->authority,
            'page' => LISTS,
            '_other' => User::getUser($this->user->id)
        ]);
    }

    public function _details()
    {
        $this->requireCompany();
        View::draw('managers/index', [
            '_authority' => $this->user->authority,
            'page' => DETAILS,
        ]);
    }

    public function _update($data)
    {
        
    }
}