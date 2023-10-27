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

    return Data::where('bildoc', $this->conditionValue)
                ->whereNull('check')
                ->get()
                ->map(function($item) {
                    return [
                        'gtnum' => $item->gtnum
                    ];
                });
}

    }



