<?php

namespace App\Imports;

use App\Models\Data;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Sadad implements ToModel
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

            DB::table('data')
            ->where('gtnum', $row[0])
            ->update([
                'paid' => 1,
                'paidby' =>  Auth::user()->name,
                'datepaid' => Carbon::now('Asia/Riyadh'),
                'paidtype'  => $row[1],

            ]);


        return null;
    }
}
