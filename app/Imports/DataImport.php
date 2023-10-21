<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rowCount = 0;
    public function model(array $row)
{
    $this->rowCount++;

    if ($this->rowCount >= 22 && $row[9] !== 'GT DISPATCHED') {
        return new Data([
            "product"=> $row[4],
            "desc"=> $row[5],
            "gtnum"=>$row[8],
            "plantkey"=>$row[1],
        ]);
    }
    return null;
}
}
