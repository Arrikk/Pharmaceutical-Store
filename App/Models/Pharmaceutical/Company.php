<?php
namespace App\Models\Pharmaceutical;

use App\Helpers\Format;
use App\Models\User;
use Core\Http\Res;
use Core\Model;
use Core\Traits\Model as TraitsModel;

class Company extends Model 
{
    use TraitsModel;
    static $table = "users";

    public static function register($data, $id)
    {
        $user = Format::data(User::getUserById($id));

        extract( (array) $data);
        $password = password_hash($data->password, PASSWORD_DEFAULT);
        if(User::userExists($login)) Res::status(409)->error("Login Already Exists");
        
        $save = self::dump([
            'approval_code' => self::clean($user->approvalCode),
            'company_name' => self::clean($user->companyName),
            'username' => self::clean($login),
            'password_hash' => $password,
            'authority' => $authority == COMPANY ? COMPANY : MANAGER,
        ]);

        return Format::data($save);
    }

    public static function accounts($id)
    {
        $user = User::getUserById($id);
        $data = self::find([
            'approval_code' => $user->approval_code,
            'and.authority' => COMPANY,
            'or.authority' => MANAGER
        ]);

        foreach ($data as $key => $value) {
            $data[$key] = Format::data($value);
        }

        return $data;
    }

    public static function getCompany($code)
    {
        return self::findOne(['company_code' => $code]);
    }

    public static function delete($id, $user)
    {
        $other = Format::data(User::getUserById($id));
        $user = Format::data(User::getUserById($user));

        if($user->approvalCode == $other->approvalCode && $user->isCompany)
        return self::findAndDelete([
            'id' => $id,
        ]);

        Res::status(401)->error("Operation Denied");
    }
}