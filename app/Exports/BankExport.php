<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class BankExport implements FromCollection
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
        // Use the $this->selectedItems and $this->alldata to fetch the actual data you want to export
        $data = $this->fetchData(); // Replace with your logic to fetch data

        // Return the data as a collection
        return collect($data);
    }

    // Replace this method with your actual logic to fetch data
    protected function fetchData()
    {
        // Your logic to fetch and prepare the data
        // For example, you might fetch data from the database based on $this->selectedItems and $this->alldata

        // Assuming you have a Data model and want to fetch data from the database
        // Replace 'column1', 'column2', etc., with the actual column names in your database table
        return Data::whereIn('id', $this->selectedItems)->get(['id'])->toArray();
    }
}
