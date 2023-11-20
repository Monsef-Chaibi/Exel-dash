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
        if ($this->alldata === 'ob') {

            return Data::whereIn('id', $this->selectedItems)->get(['plantkey','soldp','shipp','product','vin','bildoc','user2']); // Adjust columns as per your needs
        }
        if ($this->alldata == 'alldata') {

            return Data::whereIn('id', $this->selectedItems)->get(['soldp','shipp','product','plantkey','gtnum','bildoc']); // Adjust columns as per your needs
        } else {
            // Export selected data
            return Data::whereIn('id', $this->selectedItems)->get(['gtnum']); // Adjust columns as per your needs
        }
    }

}
