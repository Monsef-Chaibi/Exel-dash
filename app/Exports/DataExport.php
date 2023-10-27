<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $conditionValue;

    public function __construct($conditionValue)
    {
        $this->conditionValue = $conditionValue;
    }

    public function collection()
    {
        $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
        if(empty($selectedItems)) {
            return redirect()->back()->with('error', 'No items selected for update.');
        }
        foreach($selectedItems as $itemId) {
            return Data::where('id', $this->conditionValue)
                            ->where('check', 1)
                            ->get()
                            ->map(function($item) {
                                return [
                                    'gtnum' => $item->gtnum
                                ];
                            });
        }



}

    }



