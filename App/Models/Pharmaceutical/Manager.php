<?php
namespace App\Models\Pharmaceutical;

use App\Helpers\Format;
use App\Models\User;
use Core\Http\Res;
use Core\Model;
use Core\Traits\Model as TraitsModel;

class Managers extends Model
{
    use TraitsModel;
    static $table = '';

    public static function regster($data)
    {
        extract((array) $data);

        if(User::emailExists($email)) Res::status(409)->error("Email Already Exists");

       $safed = self::dump([
            'name' => self::clean($name),
            'username' => self::clean($username),
            'email' => self::clean($email),
            'password' => $password,
            'association' => MANAGER
        ]);
        return Format::data($safed);
    }
}