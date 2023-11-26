<?php

namespace App\Imports;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class IDImport implements ToModel
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

        if ($this->rowCount >= 3){


        // Update or insert data based on the condition
        DB::table('data')->updateOrInsert(
            ['gtnum' => $row[6]], // Condition: where gtnum equals the value in the Excel row
            [
                'regist' => $row[7],
                'idnum'  => $row[12],
                // Add other fields you want to update or insert here
            ]
        );

        // You can return a new instance of your Data model if needed
        // return new Data([
        //     'regist' => $row[0],
        //     'idnum'  => $row[1],
        // ]);
    }
        // Returning null as the import job doesn't need to return a model instance
        return null;
    }

}
