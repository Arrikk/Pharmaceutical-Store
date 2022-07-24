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

        if($user->approvalCode == $other->approvalCode && $user->isCompany || $user->isAdmin)
        return self::findAndDelete([
            'id' => $id,
        ]);

        Res::status(401)->error("Operation Denied");
    }
    
    public static function companies($data, $account = COMPANY)
    {
        if ($data->bruiz ?? null)
            Res::json([
                'total' => self::totalCompanies()->totalRec,
                'data' => User::select('*', 'users')
                    ->where('authority', COMPANY)
                    ->order('id', 'DESC')->limit(10)->exec()
            ]);

        $pagination = Format::page($data);
        extract($pagination);

        $stmt = self::select('*', 'users')
            ->where('authority', COMPANY);

        if ($searchQuery)
            $stmt->and('company_name', "%$searchQuery%", 'LIKE')->or('approval_code', "%$searchQuery%", 'LIKE');

        if ($orderDirection) {
            $stmt->order('company_name', $orderDirection);
        } else {
            $stmt->order('id', 'desc');
        }
        $stmt = $stmt->limit("$start, $length")->exec();

        foreach ($stmt as $key => $value) {
            $stmt[$key] = (object) Format::data($value);
        }

        return (object)[
            'data' => $stmt,
            'total' => self::totalCompanies()->totalRec
        ];
        // return self::find();
    }

    public static function totalCompanies()
    {
        return self::select('count(*) as totalRec', 'users')
            ->where('authority', COMPANY)->obj()->exec();
    }
}