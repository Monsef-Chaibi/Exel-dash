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
                    ->value('paid');
                $rep = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('newreference');
                $paidbya = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('paidbya');

                $id = DB::table('data')
                    ->where('gtnum', $gtnum)
                    ->value('id');

                // Assuming the existing condition is something like this:
                if ($row['status'] === 'Rejected' || $row['status'] === 'Rejected by Bank') {
                    // Add the new conditions
                    if ((int)$row['due_amount_sar'] === 0 || (int)$registValue === (int)str_replace(',', '', $row['due_amount_sar'])) {

                        $sameregist = 1;
                    } else {

                        $sameregist = 0;
                    }
                } else {
                    // Your original condition
                    $sameregist = (int)$registValue === (int)str_replace(',', '', $row['due_amount_sar']) ? 1 : 0;
                }

                $sameid = (int)$idnum === (int)$row['moi_reference_number'] ? 1 : 0;



                $aproved = ($paidValue === '2' || $paidValue === '11') ? 1 : 0;
                $uploaded = ($uploadValue === '1') ? 1 : 0;
                $paid = ((($notpaid === null  || $notpaid === '3'  || $notpaid === '2' ) && $paidbya != '1') || $notpaid === '11') ? 1 : 0;


                if ($sameregist === 1 && $sameid === 1 && $aproved === 1 && $uploaded === 1 && $paid === 1) {
                    // All conditions are true
                    if ($row['status_description'] === 'New Payment') {
                        $status = 1;
                    } elseif ($row['status_description'] !== 'New Payment') {
                        $status = 2;
                    } else {
                        $status = 3;
                    }
                } else {
                    // Not all conditions are true
                    $status = 3;
                }

                $data = [
                    'id' => $id,
                    'regist' => $row['due_amount_sar'],
                    'idnum' => $row['moi_reference_number'],
                    'gtnum' => $row['customer_reference'],
                    'vin' => $vin,
                    'product' =>$product,
                    'indb' => $indb,
                    'sameregist' => $sameregist,
                    'sameid' => $sameid,
                    'aproved' =>  $aproved,
                    'uploaded' =>  $uploaded,
                    'paid' =>  $paid,
                    'reason' => $row['status_description'] !== 'New Payment' ? $row['status_description'] : null,
                    'status'=> $status,
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
