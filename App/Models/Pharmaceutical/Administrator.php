<?php
namespace App\Models\Pharmaceutical;

use App\Helpers\Format;
use App\Helpers\Paginate;
use App\Models\User;
use Core\Http\Res;
use Core\Model;
use Core\Traits\Model as TraitsModel;

class Administrator extends Model
{
    use TraitsModel;
    static $table = 'users';

    public static function register($data)
    {
        extract((array) $data);

        if(User::emailExists($email)) Res::status(409)->error("Email Already Exists");
        if(User::userExists($login)) Res::status(409)->error("Login Already Exists");
        $password = password_hash($password, PASSWORD_DEFAULT);
       $saved = self::dump([
            'username' => self::clean($login),
            'email' => self::clean($email),
            'password_hash' => $password,
            'authority' => ADMINISTRATOR
        ]);

        return Format::data($saved);
    }
}