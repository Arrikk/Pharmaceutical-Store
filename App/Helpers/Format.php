<?php
namespace App\Helpers;
class Format
{
    public static function data($data)
    {
        return (object) [
            'id' => $data->id,
            'email' => $data->email,
            'username' => $data->username,
            'isAdmin' => $data->authority == ADMINISTRATOR,
            'isManager' => $data->authority == MANAGER,
            'isCompany' => $data->authority == COMPANY,
            'registered' => $data->createdAt,
            'companyName' => $data->company_name,
            'approvalCode' => $data->approval_code,
            'manager' => $data->manager
        ];
    }
}