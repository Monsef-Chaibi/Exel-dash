<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataSemiExport implements FromCollection
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

        if ($this->alldata == 'alldata') {
            // Export all data
            return Data::whereIn('id', $this->selectedItems)->get(['gtnum']); // Adjust columns as per your needs
        } else {
            // Export selected data
            return Data::whereIn('id', $this->selectedItems)->get(['gtnum']); // Adjust columns as per your needs
        }
    }
}
