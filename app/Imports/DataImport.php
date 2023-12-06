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

    if ($this->rowCount >= 24 && $row[9] !== 'GT TO ISTIMARAH') {

        // Check if 'gtnum' and 'bild' already exist
        $existingRecord = Data::where('gtnum', $row[8])
                              ->where('bildoc', $row[19])
                              ->first();

        if (!$existingRecord) {
            return new Data([
                "product"=> $row[4],
                "desc"=> $row[5],
                "gtnum"=>$row[8],
                "plantkey"=>$row[1],
                "soldp"=> $row[13],
                "shipp"=> $row[14],
                "bildoc"=> $row[19],
                "bildt"=> $row[20],
                "vin"=> $row[7],
                "color"=> $row[23],
                "amount"=> $row[27],
                "ordernum"=> $row[17],
            ]);
        }
    }
    return null;
}
}
