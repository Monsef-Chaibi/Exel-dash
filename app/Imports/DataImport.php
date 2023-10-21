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
            "gtnum"=>$row[8],
            "plantkey"=>$row[1],
            "soldp"=> $row[13],
            "shipp"=> $row[14],
            "bildoc"=> $row[19],
            "bildt"=> $row[21],
        ]);
    }
    return null;
}
}
