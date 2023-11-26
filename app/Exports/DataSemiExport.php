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
                ->get([ 'plantkey','soldp', 'shipp', 'product', 'vin', 'bildoc','usercheck','datecheck']);
        }
        if ($this->alldata === 'GTEXPORT') {
            $exportData = Data::whereIn('id', $this->selectedItems)
                ->get(['vin', 'gtnum', 'plantkey']);

            // Add fixed values to the "GT Status" and "Current Location" columns
            $exportData->transform(function ($item) {
                $item->setAttribute('GT Status', 'GT DISAPPEAR');
                $item->setAttribute('Current Location', 1500);
                return $item;
            });

            return $exportData;
        }

        // Export selected data
        return Data::whereIn('id', $this->selectedItems)->get(['gtnum']);
    }

    public function headings(): array
    {
        if ($this->alldata === 'GTEXPORT') {
            return [
                'Vin',
                'GT Number',
                'Plant Key',
                'GT Status',
                'Current Location',


            ];
        }
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
                'Plant Key',
                'Sold To Party',
                'Shipp To Party',
                'Product',
                'Vin',
                'Billing Document',
                'By',
                'In',
            ];
        }

        // Export selected data
        return [
            'GT Num',
        ];
    }
}
