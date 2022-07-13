<?php

namespace App\Models;

use App\Helpers\Format;
use Core\Http\Res;
use Core\Model;
use Core\Traits\Model as TraitsModel;
use Module\Upload;

class Supply extends Model
{
    use TraitsModel;
    public static $table = 'supply';

    public static function save($data, $user, $file = null)
    {
        $user = Format::data(User::getUserById($user));

        extract((array) $data);
        if (isset($file['material'])) :
            $uploaded = Upload::upload($file, 'material');
        endif;
        $saved = self::dump([
            'yj_code' => $yj_code,
            'company' => $user->approvalCode,
            'user' => $user->id,
            'product_name' => $product_name,
            'shippment_status' => $shippment_status,
            'correspondence_status' => $correspondence_status,
            'expected_time' => $expected_time,
            'material_address' => $uploaded ?? ''
        ]);

        return $saved;
    }

    public static function supplies($user = null, $data = null)
    {
        $user = User::getUserById($user);
        if($data->bruiz ?? null) Res::json(Format::fData(self::find([
            'company' => $user->approval_code,
            'order.id' => DESC,
            '$.limit' => 10
        ])));

        $start = $data->start ?? 0;
        $length = $data->length ?? 10;
        $searchQuery = $data->search['value'] ?? null;
        $orderDirection = $data->order[0]['dir'] ?? null;
        $sortColumn = $data->order[0]['column'] ?? null;

        $stmt = self::select('*', self::$table)
            ->where('company', $user->approval_code);
        if ($searchQuery)
            $stmt->and('yj_code', "%$searchQuery%", 'LIKE')
                ->or('product_name', "%$searchQuery%", 'LIKE');
        if ($orderDirection)
            $stmt->order('yj_code', $orderDirection);
        else $stmt->order('yj_code', 'desc');
        $stmt = $stmt->limit("$start, $length")->exec();

        return $stmt;
    }

    public static function updateSupplyStatus($data, $user = null)
    {
        if($data->name == "shippment_status")
        return self::findAndUpdate(
            ['id' => $data->id],
            ['shippment_status' => $data->value]
        );

        if($data->name == "correspondence_status")
        return self::findAndUpdate(
            ['id' => $data->id],
            ['correspondence_status' => $data->value]
        );
    }
}
