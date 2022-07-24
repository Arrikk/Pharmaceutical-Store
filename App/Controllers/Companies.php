<?php

namespace App\Controllers;

use App\Controllers\Authenticated\Authenticated;
use App\Models\Companies as ModelsCompanies;
use App\Models\Pharmaceutical\Company;
use App\Models\User;
use Core\Http\Res;
use League\Csv\Reader;

class Companies extends Authenticated
{
    private $authorities = [COMPANY, MANAGER];
    private $titles = ["code", "name"];

    public function _companies($data)
    {
        $obj = ModelsCompanies::companies($data);

        $data = [];
        $i = 1;
        foreach ($obj->data as $key) {
            $comp = [];
            $comp[] = $i;
            $comp[] = $key->name;
            $comp[] = $key->code;
            $comp[] = date('D M y', strtotime($key->createdAt));
            $comp[] = date('D M y', strtotime($key->updatedAt));
            // $comp[] = "<a class='btn btn-sm btn-outline-primary' href=/managers/details?user=" . $key->id . "'>View</a>";
            $i++;
            $data[] = $comp;
        }
        Res::json([
            "recordsTotal" => count($data),
            "recordsFiltered" => $obj->total,
            "data" => $data
        ]);
    }

    public function import($post)
    {
        $filename = $_FILES['file']['tmp_name'];
        $csv =  Reader::createFromPath($filename, 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset

        foreach ($csv as $value) {
            foreach ($value as $title => $val) {
                if(!in_array(strtolower($title), $this->titles)) Res::status(401)->error("Invalid Title $title");
            }
            // Res::json($value);
            $this->requires([
                'code' => $value['Code']. " || int",
                "name" => $value['Name']. " || string"
            ]);
        }

        // Res::json($csv);

    }

    public function _search($get)
    {
        $code = $get->code ?? '';
        $this->requires([
            'code' => "$code || int"
        ]);

        Res::json(ModelsCompanies::company($code));
    }

}
