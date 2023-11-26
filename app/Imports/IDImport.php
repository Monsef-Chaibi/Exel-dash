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
    public function model(array $row)
    {
        // Update or insert data based on the condition
        DB::table('data')->updateOrInsert(
            ['gtnum' => $row[7]], // Condition: where gtnum equals the value in the Excel row
            [
                'regist' => $row[8],
                'idnum'  => $row[13],
                // Add other fields you want to update or insert here
            ]
        );

        // You can return a new instance of your Data model if needed
        // return new Data([
        //     'regist' => $row[0],
        //     'idnum'  => $row[1],
        // ]);

        // Returning null as the import job doesn't need to return a model instance
        return null;
    }
}
