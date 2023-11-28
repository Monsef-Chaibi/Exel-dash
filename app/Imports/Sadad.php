<?php

use App\Models\Data;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
class Sadad implements ToModel
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Assuming $row contains the necessary data from the Excel file

        // Find the Data model by gtnum
        $data = Data::where('gtnum', $row[1])->first();

        // If the Data model is found, update the fields
        if ($data) {
            $data->paid = 1;
            $data->paidby = Auth::user()->id;
            $data->datepaid = Carbon::now('Asia/Riyadh');
            $data->paidtype = $row[2];

            $data->save();
        }

        return $data;
    }
}
