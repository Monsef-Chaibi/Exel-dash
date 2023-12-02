<?php

namespace App\Exports\Update;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;

class  implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::all();
    }
}
