<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExistExport implements FromCollection
{
    public function collection()
    {
        // Your logic to retrieve the data to export
        return collect([
            // Your data
        ]);
    }

    public function headings(): array
    {
        // Your headings for the Excel file
        return [
            'Column 1',
            'Column 2',
            // Add more columns as needed
        ];
    }
}
