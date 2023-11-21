<?php
// app/Exports/DataExport.php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSemiExport implements FromCollection, WithHeadings
{
    protected $selectedItems;
    protected $alldata;

    public function __construct($selectedItems, $alldata)
    {
        $this->selectedItems = $selectedItems;
        $this->alldata = $alldata;
    }

    public function collection()
    {
        if ($this->alldata === 'ob') {
            return Data::whereIn('id', $this->selectedItems)
                ->get(['plantkey', 'soldp', 'shipp', 'product', 'vin', 'bildoc']);
        }

        if ($this->alldata === 'alldata') {
            return Data::whereIn('id', $this->selectedItems)
                ->get(['soldp', 'shipp', 'product', 'plantkey', 'vin', 'bildoc']);
        }

        // Export selected data
        return Data::whereIn('id', $this->selectedItems)->get(['gtnum']);
    }

    public function headings(): array
    {
        if ($this->alldata === 'ob') {
            return [
                'Plant Key',
                'Sold To Party',
                'Shipp To Party',
                'Product',
                'Vin',
                'Billing Document',
               
            ];
        }

        if ($this->alldata === 'alldata') {
            return [
                'Sold To Party',
                'Shipp To Party',
                'Product',
                'Plant Key',
                'Vin',
                'Billing Document',
            ];
        }

        // Export selected data
        return [
            'GT Num',
        ];
    }
}
