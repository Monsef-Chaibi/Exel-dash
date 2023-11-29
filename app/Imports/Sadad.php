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
        // Check if all columns with matching GT number have 'paid' value not equal to 1 and 2
        $gtNumber = $row[0];
        $invalidPaidValues = DB::table('data')
            ->where('gtnum', $gtNumber)
            ->whereIn('paid', [1, 2])
            ->get();

        if ($invalidPaidValues->count() > 0) {
            // Validation error, return null
            return null;
        }

        // Check if there are more than one row with the same GT number in the 'regist' column
        $RegistValues = DB::table('data')
        ->where('gtnum', $gtNumber)
        ->where('regist', '<', 1)
        ->count();


        if ($RegistValues > 0) {
            // Validation error, return null
            return null;
        }

        // Proceed with updating the database if all checks pass
        DB::table('data')
            ->where('gtnum', $row[0])
            ->update([
                'paid' => 1,
                'paidby' => Auth::user()->name,
                'datepaid' => Carbon::now('Asia/Riyadh'),
                'paidtype' => $row[1],
            ]);

        return null;
    }



}
