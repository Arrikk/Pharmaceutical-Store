<?php
namespace App\Models\Pharmaceutical;

use App\Helpers\Format;
use Core\Model;
use Core\Traits\Model as TraitsModel;

class Company extends Model 
{
    use TraitsModel;
    static $table = "users";

    public static function register($data)
    {
        extract( (array) $data);
        $password = password_hash($data->password, PASSWORD_DEFAULT);
        
        $save = self::dump([
            'approval_code' => self::clean($approval_code),
            'company_name' => self::clean($company_name),
            'username' => self::clean($login),
            'password_hash' => $password,
            'authority' => $authority == COMPANY ? COMPANY : MANAGER,
        ]);

        return Format::data($save);
    }

    public static function accounts()
    {
        
    }
}