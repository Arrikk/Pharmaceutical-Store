<?php

namespace App\Controllers\Accounts;

use App\Controllers\Authenticated\Authenticated;
use App\Models\Pharmaceutical\Company as PharmaceuticalCompany;
use App\Models\User;
use Core\Http\Res;

class Company extends Authenticated
{
    private $authorities = [COMPANY, MANAGER];

    public function _register($data)
    {
        extract((array) $data);
        $login = $login ?? '';
        $authority = $authority ?? '';
        $password = $password ?? '';
        // echo $approval_code; exit;
        $this->requires([
            'login_id'  => "$login || string",
            'authority' => "$authority || string",
            'password' => "$password || any"
        ]);

        if(!in_array(strtolower($authority), $this->authorities)) Res::status(400)->error("Invalid Classifications");
        Res::json(PharmaceuticalCompany::register($data, $this->user->id));
    }

    public function _accounts()
    {
        $this->requireCompany();
        Res::json(PharmaceuticalCompany::accounts($this->user->id));
    }

    public function _delete($data)
    {
        $this->requireCompany();
        $this->required(['id' => $data->id ?? '']);
        Res::json(PharmaceuticalCompany::delete($data->id, $this->user->id));
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
    // public function _accounts($data)
    // {
    //     $this->requireCompany();
    //     Res::json(User::accounts(COMPANY, $data));
    // }
}
