<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HSBCImport implements ToModel, WithHeadingRow
{
    private $customerReferences = [];
    private $rowCount = 0;

    public function model(array $row)
    {

        $this->rowCount++;

        if ($this->rowCount >= 1 ) {
            $dbRecord = Data::where('gtnum', $row['customer_reference'])->first();
           
            // Check if the 'Request type' is not equal to 'Payment Request'
            // and the 'Due amount (SAR)' is less than 1
            if ($row['request_type'] !== 'Payment Request' || $row['due_amount_sar'] < 1 || $dbRecord->done === null) {
                // Store the 'Customer reference' value in the array
                $this->customerReferences[] = $row['customer_reference'];
            }

            // No data is added to the database, so return null
            return null;
        }
    }
    public function getCustomerReferences()
    {
        return $this->customerReferences;
    }
}
