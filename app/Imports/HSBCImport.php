<?php
namespace App\Imports;

use App\Models\Data;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HSBCImport implements ToModel, WithHeadingRow
{
    private $rowCount = 0;
    private $importedData = [];

    public function model(array $row)
    {
        $this->rowCount++;

        $gtnum = $row['customer_reference'];

        if ($this->rowCount >= 1) {

            if ( $row['status'] === 'Rejected' || $row['status'] === 'Rejected by Bank' || ($row['status_description'] === 'New Payment' && $row['status'] === 'Pending Authorization')) {

                $existsInDb = DB::table('data')
                ->where('gtnum', $gtnum)
                ->exists();

                $indb = $existsInDb ? 1 : 0;

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

                $paidValue = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('paid');
                $uploadValue = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('done');
                $notpaid = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('paidbya');

                $id = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('id');

                $sameregist = $registValue === $row['due_amount_sar'] ? 1 : 0;
                $sameid = (int)$idnum === $row['moi_reference_number'] ? 1 : 0;
                $aproved = ($paidValue === '2') ? 1 : 0;
                $uploaded = ($uploadValue === '1') ? 1 : 0;
                $paid = ($notpaid !== '1') ? 1 : 0;

                $data = [
                    'id' => $id,
                    'regist' => $row['due_amount_sar'],
                    'idnum' => $row['moi_reference_number'],
                    'gtnum' => $row['customer_reference'],
                    'vin' => $vin,
                    'product' => $product,
                    'indb' => $indb,
                    'sameregist' => $sameregist,
                    'sameid' => $sameid,
                    'aproved' =>  $aproved,
                    'uploaded' =>  $uploaded,
                    'paid' =>  $paid,
                    'reason' =>  $row['status_description'] != 'New Payment' ? $row['status_description'] : null,
                ];

                // Store the data in the $importedData array
                $this->importedData[] = $data;

                // Return null to indicate that no Eloquent model should be created
                return null;
            }
        }

        // No data is added to the database, so return null
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
