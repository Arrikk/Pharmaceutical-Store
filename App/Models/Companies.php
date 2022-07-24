<?php

namespace App\Models;

use App\Helpers\Format;
use Core\Http\Res;
use Core\Model;
use Core\Traits\Model as TraitsModel;

class Companies extends Model
{
    use TraitsModel;
    public static $table = 'companies';

    public function register($data, $exit = false)
    {
        if (self::company($data->code)) Res::status(409)->error('Company already Registered');

        return self::dump([
            'code' => (int) $data->code,
            'name' => static::clean($data->name)
        ]);
    }

    public static function company($id)
    {
        return self::findOne(['code' => $id]);
    }

    public static function companies($data)
    {
        if ($data->bruiz ?? null)
            Res::json([
                'total' => self::totalCompanies()->totalRec,
                'data' => self::find([
                    'order.id' => DESC,
                    '$.limit' => 10
                ])
            ]);

        $pagination = Format::page($data);
        extract($pagination);

        $stmt = self::select('*', self::$table);

        if ($searchQuery)
            $stmt->where('name', "%$searchQuery%", 'LIKE')->or('code', "%$searchQuery%", 'LIKE');

        if ($orderDirection) {
            $stmt->order('name', $orderDirection);
        } else {
            $stmt->order('id', 'desc');
        }
        $stmt = $stmt->limit("$start, $length")->exec();

        foreach ($stmt as $key => $value) {
            $stmt[$key] = (object) $value;
        }

        return (object)[
            'data' => $stmt,
            'total' => self::totalCompanies()->totalRec
        ];
        // return self::find();
    }

    public static function totalCompanies()
    {
        return self::findOne([], 'count(*) as totalRec');
    }
}
