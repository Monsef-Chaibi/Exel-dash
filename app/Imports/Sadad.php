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

        return [
            'gtnum' => $gtnum,
            'paid' => $paidValue,
            'regist' => $registValue
        ];
        // Store the first and second rows in the $importedData array
        $this->importedData[] = [
            'GTnum' => $row[0],
            'rgtype' => $row[1],
        ];

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
