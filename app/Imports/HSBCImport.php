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
            if ($row['request_type'] !== 'Payment Request' || $row['due_amount_sar'] < 1 || $dbRecord && ($dbRecord->done === null)) {
                $errorType = '';
                if ($row['request_type'] !== 'Payment Request') {
                    $errorType .= 'Request type is not Payment Request. ';
                }
                if ($row['due_amount_sar'] < 1) {
                    $errorType .= 'Due amount (SAR) is less than 1. ';
                }
                if ($dbRecord && $dbRecord->done === null) {
                    $errorType .= 'Not Done ';
                }

                // Store the custom error message in the array
                $this->customerReferences[] = "Due amount (SAR): " . $row['due_amount_sar'] .
                    " Request type: " . $row['request_type'] .
                    " GT Num: " . $row['customer_reference'] .
                    " Type of error: " . $errorType;
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
