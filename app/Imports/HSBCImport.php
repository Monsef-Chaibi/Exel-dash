<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HSBCImport implements ToModel, WithHeadingRow
{
    // Define variables to store statistics
    private $rowCount = 0;  // Total row count
    private $amountGreaterThanOneCount = 0;  // Count of rows where amount is greater than 1
    private $paymentRequestCount = 0;  // Count of rows where payment type is 'Payment Request'
    private $gtPaidCount = 0;  // Count of rows where 'gt' number is found and 'paid' column is 2

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Increment total row count
        $this->rowCount++;

        // Check if the amount is greater than 1
        if (isset($row['Due amount (SAR)']) && $row['Due amount (SAR)'] > 1) {
            $this->amountGreaterThanOneCount++;
        }

        // Check if payment type is 'Payment Request'
        if (isset($row['Request type']) && $row['Request type'] === 'Payment Request') {
            $this->paymentRequestCount++;

            // Find the corresponding record in the database where 'gt' is the row's GT number
            $dbRecord = Data::where('gt', $row['GT number'])->first();

            // Check if the record is found and if its 'paid' column is equal to 2
            if ($dbRecord && $dbRecord->paid == 2) {
                $this->gtPaidCount++;
            }
        }

        // No data is added, so return null
        return null;
    }

    /**
     * Get the gathered statistics after processing the file
     */
    public function getStatistics()
    {
        return [
            'rowCount' => $this->rowCount,
            'amountGreaterThanOneCount' => $this->amountGreaterThanOneCount,
            'paymentRequestCount' => $this->paymentRequestCount,
            'gtPaidCount' => $this->gtPaidCount,
        ];
    }
}
