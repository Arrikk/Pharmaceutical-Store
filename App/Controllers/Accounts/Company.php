<?php

namespace App\Controllers\Accounts;

use App\Controllers\Authenticated\Authenticated;
use App\Models\User;
use Core\Http\Res;

class Company extends Authenticated
{
    public function _accounts($data)
    {
        $this->requireCompany();
        Res::json(User::accounts(COMPANY, $data));
    }
}
