<?php

namespace App\Controllers\Accounts;

use App\Controllers\Authenticated\Authenticated;
use App\Models\Companies;
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
    public function _companies($data)
    {
        $obj = PharmaceuticalCompany::companies($data);

        $data = [];
        $i=1;
        foreach ($obj->data as $key) {
            $comp = [];
            $comp[] = $i;
            $comp[] = $key->companyName;
            $comp[] = $key->approvalCode;
            $comp[] = $key->username;
            $comp[] = date('D M y', strtotime($key->registered));
            $comp[] = date('D M y', strtotime($key->updated));
            $comp[] = "<a class='btn btn-sm btn-outline-primary' href=/managers/details?user=".$key->id."'>View</a>";
            $i++;
            $data[] = $comp;
        }
        Res::json([
            "recordsTotal" => count($data),
            "recordsFiltered" => $obj->total,
            "data" => $data
        ]);
    }

    public function _save($post)
    {
        $password = $post->password ?? '';
        $code = $post->approval_code ?? '';
        $authority = $post->authority ?? '';
        $email = $post->email ?? '';
        $phone = $post->phone ?? '';
        $login = $post->login ?? '';

        $this->requires([
            'password' => "$password || any",
            'code' => "$code || int",
            'email' => "$email || any",
            'login' => "$login || string",
            'phone' => "$phone || int",
            'authority' => "$authority || string"
        ]);

        if (!in_array(strtolower($authority), $this->authorities)) Res::status(400)->error("Invalid Classifications");

        $user = new User($post);
        Res::send($user->save());
        exit;
    }
}
