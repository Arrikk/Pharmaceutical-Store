<?php
namespace App\Controllers\Accounts;

use App\Controllers\Authenticated\Authenticated;
use App\Models\Pharmaceutical\Administrator;
use App\Models\Pharmaceutical\Company;
use App\Models\User;
use Core\Http\Res;0

class Admin extends Authenticated
{
    public function registerCompany($data)
    {
        extract((array) $data);
        $approval_code = $approval_code ?? '';
        $company_name = $company_name ?? '';
        $login = $login ?? '';
        $authority = $authority ?? '';
        $password = $password ?? '';
        // echo $approval_code; exit;
        $this->requires([
            'approval_code' => "$approval_code || int",
            'company_name' => "$company_name || string",
            'login_id'  => "$login || string",
            'authority' => "$authority || string",
            'password' => "$password || any"
        ]);

        Res::json(Company::register($data));
    }

    public function registerSelf($data)
    {
        
        extract((array) $data);
        $login = $login ?? '';
        $email = $email ?? '';
        $authority = $authority ?? '';
        $password = $password ?? '';

        $this->requires([
            'login' => "$login || string",
            'email' => "$email || any",
            'password' => "$password || any"
        ]);

        Res::json(Administrator::register($data));
    }

    public function _accounts($data)
    {
        $this->requireAdmin();
        Res::json(User::accounts(ADMINISTRATOR, $data));
    }
}