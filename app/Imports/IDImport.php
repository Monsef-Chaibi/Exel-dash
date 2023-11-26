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
        // Check if the current row is greater than or equal to 3
        if ($rowNumber = array_search($row, array_values($row))) {
            if ($rowNumber >= 2) {
                // Update or insert data based on the condition
                DB::table('data')->updateOrInsert(
                    ['gtnum' => $row[6]], // Condition: where gtnum equals the value in the Excel row
                    [
                        'regist' => $row[7],
                        'idnum'  => $row[12],
                        // Add other fields you want to update or insert here
                    ]
                );
            }
        }

        // Returning null as the import job doesn't need to return a model instance
        return null;
    }

}
