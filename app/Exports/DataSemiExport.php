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
                return [
                    'VIN' => $item->vin,
                    'GT Number' => $item->gtnum,
                    'GT Status' => 'GT DISAPPEAR',
                    'Current_Location' => 1500,
                    'AWB_No' => '', // Set as empty
                    'Courier_Reference_number' => '', // Set as empty
                    'Service_Provider' => '', // Set as empty
                    'Receiver_Plant' => $item->plantkey, // Replace 'Plant Key' with 'Receiver Plant'
                ];
            });

            return $exportData;
        }
        if ($this->alldata === 'GTEXPORT') {
            $exportData = Data::whereIn('id', $this->selectedItems)
                ->get(['vin', 'gtnum', 'plantkey']);

            // Add fixed values to the "GT Status" and "Current Location" columns
            $exportData->transform(function ($item) {
                return [
                    'VIN' => $item->vin,
                    'GT Number' => $item->gtnum,
                    'GT Status' => 'GT DISAPPEAR',
                    'Current_Location' => 1500,
                    'AWB_No' => '', // Set as empty
                    'Courier_Reference_number' => '', // Set as empty
                    'Service_Provider' => '', // Set as empty
                    'Receiver_Plant' => $item->plantkey, // Replace 'Plant Key' with 'Receiver Plant'
                ];
            });

            return $exportData;
        }
        if ($this->alldata === 'Private' || $this->alldata === 'Public transport' || $this->alldata === 'Private transport') {
            $exportData = Data::whereIn('id', $this->selectedItems)
            ->get(['gtnum', 'idnum' , 'paidtype']);

        // Add fixed values to the "GT Status" and "Current Location" columns
        $exportData->transform(function ($item) {

            // Add conditions based on $this->alldata
            if ($item->paidtype === 'Private transport') {
                $field3 = '03';
                $field4 = '12';
            } elseif ($item->paidtype === 'Private') {
                $field3 = '01';
                $field4 = '05';
            } elseif ($item->paidtype === 'Public transport') {
                $field3 = '02';
                $field4 = '12';
            }

            return [
                'MOI SERVICE' => '094',
                'SERVICE TYPE' => '042',
                'GUSTOMER REFERENCE' =>  $item->gtnum,
                'FIELD 1' => $item->idnum,
                'FIELD 2' =>  $item->gtnum,
                'FIELD 3' => $field3,
                'FIELD 4' => $field4,
                'FIELD 5' => 'N',
            ];
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
            'VIN',
            'GT Number',
            'GT Status',
            'Current_Location',
            'AWB_No',
            'Courier_Reference_number',
            'Service_Provider',
            'Receiver_Plant',
        ];
    }
    if ($this->alldata === 'Private' || $this->alldata === 'Public transport' || $this->alldata === 'Private transport') {
        return [
            'MOI SERVICE' ,
            'SERVICE TYPE' ,
            'GUSTOMER REFERENCE' ,
            'FIELD 1',
            'FIELD 2',
            'FIELD 3',
            'FIELD 4',
            'FIELD 5',
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
