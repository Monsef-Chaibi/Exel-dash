<?php
namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class Sadad implements ToModel
{
    protected $importedData = [];

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $gtnum = $row[0];
        $paidValue = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('paid');

        $registValue = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('regist');

        $idnum = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('idnum');

        $product = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('product');

        $vin = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('vin');

        $id = DB::table('data')
            ->where('gtnum', $gtnum)
            ->value('id');

        $data = [
            'id' => $id,
            'gtnum' => $gtnum,
            'paid' => $paidValue,
            'regist' => $registValue,
            'rgtype' => $row[1],
            'idnum' => $idnum,
            'product' => $product,
            'vin' => $vin,
        ];

        // Store the data in the $importedData array
        $this->importedData[] = $data;

        // Return null to indicate that no Eloquent model should be created
        return null;
    }

    /**
     * Get the imported data.
     *
     * @return array
     */
    public function getImportedData()
    {
        return $this->importedData;
    }
}
