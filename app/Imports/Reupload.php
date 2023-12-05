<?php

namespace App\Imports;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class Reupload implements ToModel
{
    protected $Data = [];
    protected $rowCount = 0;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $this->rowCount++;

        // Skip the first row (header)
        if ($this->rowCount === 1) {
            return null;
        }

        // Check if any cell in the row is empty
        if (empty(array_filter($row))) {
            return null;
        }

        $gtnum = $row[0];
        $old = $row[1];
        $paidValue = DB::table('data')->where('gtnum', $gtnum)->value('paidbya');
        $product = DB::table('data')->where('gtnum', $gtnum)->value('product');
        $fee = DB::table('data')->where('gtnum', $gtnum)->value('regist');
        $type = DB::table('data')->where('gtnum', $gtnum)->value('idnum');
        $paid = DB::table('data')->where('gtnum', $gtnum)->value('paid');

        $data = [
            'gtnum' => $gtnum,
            'old' => $old,
            'new' => $row[2],
            'paidbya' => $paidValue,
            'paid' => $paid,
            'product' => $product,
            'fee' => $fee,
            'type' => $type,
        ];

        // Store the data in the $importedData array
        $this->Data[] = $data;

        // Return null to indicate that no Eloquent model should be created
        return null;
    }

    /**
     * Get the imported data.
     *
     * @return array
     */
    public function Data()
    {
        return $this->Data;
    }
}
