<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataSemiExport implements FromCollection
{
    protected $selectedItems;

    public function __construct($selectedItems)
    {
        $this->selectedItems = $selectedItems;
    }

    public function collection()
    {
        return Data::whereIn('id', $this->selectedItems)->get(['gtnum']); // Adjust columns as per your needs
    }
}
