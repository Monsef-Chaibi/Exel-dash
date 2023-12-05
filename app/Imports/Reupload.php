<?php

namespace App\Imports;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class Reupload implements ToModel
{
    protected $Data = [];

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $gtnum = $row[0];
        $paidValue = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('paidbya');
        $product = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('product');
        $fee = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('regist');
        $type = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('idnum');
        $paid = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('paid');
        $data = [
            'gtnum' => $row[0],
            'old' => $row[1],
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
