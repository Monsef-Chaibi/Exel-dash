<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Models\Data;
use App\Models\Update;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function import(){
        try {
            Data::whereNull('status')->delete();
            $tableLength = Update::count();
            if ($tableLength >= 5) {
                // Get the oldest record
                $oldestRecord = Update::orderBy('created_at')->first();

                // Delete the oldest record
                $oldestRecord->delete();
            }
            $data = [
                'name' => Auth::user()->name,
            ];
            Update::create($data);
        Excel::Import(new DataImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data inserted successfully.');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Opps! A simple problem , Try Again'. $e->getMessage());
    }
    }
    function adduser(){
        return view('adduser');
    }
    function test(){
        $cnd=auth()->user()->cond;
        $cnd1 = explode(',', $cnd);
        dd($cnd1);
    }
    function alluser(){
        $users = User::where('role', '!=', 1)->get();
        return view('alluser')->with('users', $users);
    }
    function AddData(){
        return view('AddData');
    }
    function ViewData(){
        $latestRecord = Update::whereNotNull('created_at')->latest()->first();

            if ($latestRecord) {
                $latestDate ='By ' .$latestRecord->name . ' in ' . $latestRecord->created_at;
            } else {
                $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
            }
        $data=Data::paginate(5);
        return view('ViewData')->with('data', $data)->with('latestDate', $latestDate);
    }
        function StoreUser(Request $request){
            try {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'pass' => 'required|min:6',
                    'pass_ver' => 'required|same:pass',
                    'role' => 'required',
                ]);

                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('pass')),
                    'role' => $request->input('role'),
                    'cond' => $request->input('cond'),
                    // Other fields...
                ]);
                return redirect()->back()->with('success', 'Data inserted successfully.');
            }
            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Name already exists Or Password not match');
            }
        }
        function action(Request $request)
        {
            if(auth()->user()->cond == 0)
            {
                if($request->ajax())
                {

                    $output = '';
                    $query = $request->get('query');
                    if($query != '') {
                        $data = DB::table('data')
                        ->where('bildoc', 'like', '%' . $query . '%')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
                                <td><a class="button-32"  href="/Show/'.$row->bildoc.'">Show</a></td>
                            </tr>
                            ';
                        }
                    } else {
                        $output = '
                        <tr>
                        <td  colspan="8">No Data Found</td>
                        </tr>
                        ';
                    }
                    $data = array(
                        'table_data'  => $output,
                        'total_data'  => $total_row
                    );
                    echo json_encode($data);
                }
            }
            else
            {
                if($request->ajax())
                {   $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);

                    $output = '';
                    $query = $request->get('query');
                    if($query != '') {
                        $data = DB::table('data')
                        ->whereIn('plantkey', $cnd1)
                        ->where('bildoc', 'like', '%' . $query . '%')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->whereIn('plantkey', $cnd1)
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
                                <td><a class="button-32" href="/Show/'.$row->bildoc.'">Show</a></td>
                            </tr>
                            ';
                        }
                    } else {
                        $output = '
                        <tr>
                            <td  colspan="8">No Data Found</td>
                        </tr>
                        ';
                    }
                    $data = array(
                        'table_data'  => $output,
                        'total_data'  => $total_row
                    );
                    echo json_encode($data);
                }
            }


        }
        function actionB(Request $request)
        {
            if(auth()->user()->cond == 0)
            {
                if($request->ajax())
                {

                    $output = '';
                    $query = $request->get('query');
                    if($query != '') {
                        $data = DB::table('data')
                        ->where('bildoc', 'like', '%' . $query . '%')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
                                <td><a class="button-32"  href="/ShowForB/'.$row->bildoc.'">Show</a></td>
                            </tr>
                            ';
                        }
                    } else {
                        $output = '
                        <tr>
                        <td  colspan="8">No Data Found</td>
                        </tr>
                        ';
                    }
                    $data = array(
                        'table_data'  => $output,
                        'total_data'  => $total_row
                    );
                    echo json_encode($data);
                }
            }
            else
            {
                if($request->ajax())
                {   $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);

                    $output = '';
                    $query = $request->get('query');
                    if($query != '') {
                        $data = DB::table('data')
                        ->whereIn('plantkey', $cnd1)
                        ->where('bildoc', 'like', '%' . $query . '%')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->whereIn('plantkey', $cnd1)
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
                                <td><a class="button-32" href="/Show/'.$row->bildoc.'">Show</a></td>
                            </tr>
                            ';
                        }
                    } else {
                        $output = '
                        <tr>
                            <td  colspan="8">No Data Found</td>
                        </tr>
                        ';
                    }
                    $data = array(
                        'table_data'  => $output,
                        'total_data'  => $total_row
                    );
                    echo json_encode($data);
                }
            }


        }
    function Show($id){
        $typeid = $id;
        $results = DB::table('data')
            ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(status) as total_status'))
            ->where('bildoc', $typeid) // Add this line to filter out null statuses
            ->first();



        $totalRows = $results->total_rows;
        $totalFf = $results->total_status;

        if ($totalRows > 0 && $totalRows == $totalFf) {
            $status = 1;
        } elseif ($totalFf != '' && $totalRows != $totalFf) {

            $status = 2;
        }
        else{
            $status = 3;
        }

        $userinfo = Data::where('bildoc', $id)
        ->whereNotNull('status')
        ->GroupBy('created_at') // Order by date in ascending order
        ->get();
        $title = Data::where('bildoc',$id)->first();
        $data = Data::where('bildoc',$id)->get();
        return view('Show')->with('data',$data)->with('title',$title)->with('status',$status)->with('userinfo',$userinfo);
        }
    function ShowForB($id){
        $typeid = $id;
        $results = DB::table('data')
            ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(status) as total_status'))
            ->where('bildoc', $typeid) // Add this line to filter out null statuses
            ->first();



        $totalRows = $results->total_rows;
        $totalFf = $results->total_status;

        if ($totalRows > 0 && $totalRows == $totalFf) {
            $status = 1;
        } elseif ($totalFf != '' && $totalRows != $totalFf) {

            $status = 2;
        }
        else{
            $status = 3;
        }
        $userinfo = Data::where('bildoc', $id)
        ->whereNotNull('status')
        ->GroupBy('nameuser') // Order by date in ascending order
        ->get();
        $title = Data::where('bildoc',$id)->first();
        $data = Data::where('bildoc',$id)->orderBy('status', 'desc')->get();
        return view('ShowForB')->with('data',$data)->with('title',$title)->with('status',$status)->with('userinfo',$userinfo);
        }

        function Status($id){
            DB::table('data')
            ->where('bildoc', $id) // Assuming $id is the ID of the product you want to update
            ->update([
                'nameuser' => Auth::user()->name,
                'dateset' => Carbon::now(),
                'status' => 1,
            ]);
            return redirect()->back()->with('success', 'Successfully.');
        }
        function SemiCheck(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'nameuser' => Auth::user()->name,
                        'dateset' => Carbon::now(),
                        'status' => 1,
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
        function SemiCopie(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                // Loop through selected items and update the database
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'check' => 1,
                        'usercheck' => Auth::user()->name,
                        'datecheck' => Carbon::now(),
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
            function Showsetuser($nameuser, $boldoc){
                $title = Data::where('bildoc',$boldoc)->first();
                $data = Data::where('nameuser', $nameuser)->where('bildoc',$boldoc)->get();
                return view('Showsetuser')->with('data',$data)->with('title',$title);
            }
            function SowChekUser($boldoc){
                $data = Data::where('bildoc',$boldoc)->where('check',1)->get();
                return view('SowChekUser')->with('data',$data);
            }
            function export($conditionValue)
            {
                return Excel::download(new DataExport($conditionValue), 'Gt-Number.xlsx');
            }
            function ShowUpdateData()
            {
                $data= Update::get();
                return view('ShowUpdateData')->with('data',$data);
            }
}
