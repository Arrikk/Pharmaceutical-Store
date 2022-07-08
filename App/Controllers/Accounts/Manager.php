<?php

namespace App\Controllers\Accounts;

use App\Controllers\Authenticated\Authenticated;
use App\Models\User;
use Core\Http\Res;

class Manager extends Authenticated
{
    public function _accounts($data)
    {
        $this->requireManager();
        Res::json(User::accounts(MANAGER, $data));
    }
}
