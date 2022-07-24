<?php
namespace App\Helpers;

use Core\Http\Res;

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
            'classification' => ucwords(str_replace('_', ' ', $data->authority)),
            'manager' => $data->manager,
            'updated' => $data->updatedAt
        ];
    }

    public static function shipmentStatus()
    {
        return (object) [
            '1' => 'A. Shipping volume is normal',
            '2' => 'B. Decrease in shipment volume',
            '3' => 'C. Shipment volume hindrance',
            '4' => 'D. Suspension of shipment'
        ];
    }
    public static function distributorStatus()
    {
        return (object) [
            '1' => '① Normal shipping',
            '2' => '② Limited shipment (company circumstances)',
            '3' => '③ Limited shipment (influence of other companies products)',
            '4' => '④ Limited shipment (others)'
        ];
    }

    public static function shippmentStatusTable($index, $id)
    {
        $html = '<select class="change_status" name="shippment_status" data-id="'.$id.'">';
        foreach (self::shipmentStatus() as $key => $value) {
            $selected = "";
            if((int)$key == (int) $index) $selected = 'selected';
            $html .= "<option value='".$key."' ".$selected.">".$value."</option>";
        }
        $html .= '</select>';
        return $html;
    }
    public static function distStatusTable($index, $id)
    {
        $html = '<select class="change_status" name="correspondence_status" data-id="'.$id.'">';
        foreach (self::distributorStatus() as $key => $value) {
            $selected = "";
            if($key == $index) $selected = 'selected';
            $html .= "<option value='".$key."'".$selected.">".$value."</option>";
        }
        $html .= '</select>';
        return $html;
    }

    public static function fData($data)
    {
        foreach ($data as $key => $value) {
            $data[$key]->shippment_status = self::shippmentStatusTable($value->shippment_status, $value->id);
            $data[$key]->correspondence_status = self::shippmentStatusTable($value->correspondence_status, $value->id);
        }
        return $data;
    }

    public static function expctedData($string)
    {
        $data = [
            "YJ Code", "Product Name", "Shippment Status",
            "Correspondence status of product distribition",
            "Expected time to resolve shipping obstacles", 
            "Information Material Address"
        ];

        $data = array_map([(new static), 'lowerCase'], $data);

        if(!in_array(strtolower($string), $data)) Res::status(400)->error("Please Reformat Your title '".$string."' ");

        return true;

    }

    public function lowerCase($string)
    {
        return strtolower($string);
    }

    public static function page($data)
    {
        $start = $data->start ?? 0;
        $length = $data->length ?? 10;
        $searchQuery = $data->search['value'] ?? null;
        $orderDirection = $data->order[0]['dir'] ?? null;
        $sortColumn = $data->order[0]['column'] ?? null;

        return [
            'start' => $start,
            'length' => $length,
            'searchQuery' => $searchQuery,
            'orderDirection' => $orderDirection,
            'sortColumn' => $sortColumn
        ];
    }

}