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
        $gtNumber = $row[0];

        // Check if there are invalid 'paid' values
        $invalidPaidValues = DB::table('data')
            ->where('gtnum', $gtNumber)
            ->whereIn('paid', [1, 2])
            ->get();

        if ($invalidPaidValues->count() > 0) {
            // Validation error, throw an exception
            throw new \Exception("The request has been used before with a GT number $gtNumber");
        }

        // Check if there are more than one row with the same GT number and 'regist' less than 1
        $registValues = DB::table('data')
        ->where('gtnum', $gtNumber)
        ->where(function ($query) {
            $query->where('regist', '<', 1)
                ->orWhereNull('regist');
        })
        ->count();
        if ($registValues > 0) {
            // Validation error, throw an exception
            throw new \Exception("There is no vehicle plate fees  $gtNumber");
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

        // Return success model or null if no error occurred
        return null;
    }



}
