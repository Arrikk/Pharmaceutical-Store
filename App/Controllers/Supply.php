<?php

namespace App\Controllers;

use App\Controllers\Authenticated\Authenticated;
use App\Helpers\Format;
use App\Models\Supply as ModelsSupply;
use Core\Http\Res;
use League\Csv\Reader;
use Module\File;
use Module\Upload;

class Supply extends Authenticated
{
    public function _supply($data)
    {
        extract((array) $data);
        $this->required([
            'YJ Code' => $yj_code ?? '',
            'Company Name' => $product_name ?? '',
            'Shippment Status' => $shippment_status ?? '',
            'Correspondense Status' => $correspondence_status ?? '',
            'Expected Time' => $expected_time ?? ''
        ]);

        if (!array_key_exists($shippment_status, (array) Format::shipmentStatus()))
            Res::status(400)->error("Invalid Shippment Status");

        if (!array_key_exists($correspondence_status, (array) Format::distributorStatus()))
            Res::status(400)->error("Invalid Correspondence status");

        Res::json(ModelsSupply::save($data, $this->user->id, $_FILES));
    }
    public function _import($data)
    {
        $filename = $_FILES['file']['tmp_name'];
        $csv =  Reader::createFromPath($filename, 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $header = $csv->getHeader(); //returns the CSV header record
        $records = $csv->getRecords(); //returns all the CSV records as an Iterator object

        $formattedData = [];
        foreach ($csv as $key => $values) {
            foreach ($values as $title => $value) :
                Format::expctedData($title);
            endforeach;
            $format = $this->format(array_flip($values));
            $data = (object) array_flip($format);
            //    $formatted
            $shippment = array_search(str_replace('\'', '', $data->shippment ?? ''), (array) Format::shipmentStatus());

            $correspondence = array_search(str_replace('\'', '', $data->correspondence ?? ''), (array) Format::distributorStatus());

            if(!$correspondence || !$shippment) Res::status(400)->error('Invalid Correspondence or shippment status');

            $formatted = [
                'yj_code' => $data->yj ?? '',
                'product_name' => $data->product ?? '',
                'shippment_status' => $shippment,
                'correspondence_status' => $correspondence,
                'expected_time' => $data->expected ?? '',
                'material_address' => $data->information ?? '',
            ];

            $formattedData[] = ModelsSupply::save($formatted, $this->user->id);
        }

        Res::json($formatted);
    }
    public function format($data)
    {
        foreach ($data as $d => $val) {
            $exp = explode(' ', trim($val));
            $data[$d] = strtolower($exp[0]);
        }
        return $data;
    }
    public function _supplies($data)
    {
        $supplies = ModelsSupply::supplies($this->user->id, $data);
        // Res::json($supplies);
        $data = [];
        foreach ($supplies as $key) {
            $supply = [];
            $supply[] = $key->yj_code;
            $supply[] = $key->product_name;
            $supply[] = Format::shippmentStatusTable($key->shippment_status, $key->id);
            $supply[] = Format::distStatusTable($key->correspondence_status, $key->id);
            $supply[] = $key->expected_time;
            $supply[] = $key->material_address;
            $supply[] = date('M d Y', strtotime($key->createdAt));
            $supply[] = date('M d Y', strtotime($key->updatedAt));
            $data[] = $supply;
        }
        Res::json([
            "recordsTotal" => 57,
            "recordsFiltered" => 57,
            "data" => $data
        ]);
    }

    public function _update($data)
    {
        $data = $data->data ?? [];
        if (empty($data)) Res::status(400)->error("Update Empty");
        foreach ($data as $key) {
            if ($key->name !== "shippment_status" && $key->name !== "correspondence_status") Res::status(400)->error("Request not Valid");

            if ($key->name == "shippment_status") {
                if (!array_key_exists($key->value, (array) Format::shipmentStatus()))
                    Res::status(400)->error("Invalid Supply status");
            }
            if ($key->name == "correspondence_status") {
                if (!array_key_exists($key->value, (array) Format::distributorStatus()))
                    Res::status(400)->error("Invalid Correspondence status");
            }
        }

        foreach ($data as $key) {
            $updated = ModelsSupply::updateSupplyStatus($key, $this->user->id);
            if (!$updated) continue;
        }
        Res::json($data);
    }

    public function validateData($data)
    {
    }
}
