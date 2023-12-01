<?php

namespace App\Http\Controllers;
use App\Models\Aljuf;
use App\Models\ColorCode;
use PDF;

use Maatwebsite\Excel\Validators\ValidationException;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\Debug\Exception\OutOfMemoryException;
use App\Exports\DataExport;
use App\Exports\DataSemiExport;
use App\Imports\DataImport;
use App\Imports\IDImport;
use App\Imports\Sadad;
use App\Imports\HSBCImport;
use App\Models\Brand;
use App\Models\ContratUser;
use App\Models\Data;
use App\Models\Port;
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
    function DashboardB(){
        return view('DashboardB');
    }
    function SadadView(){
        return view('SadadView');
    }
    function SadadStatusA(){
        return view('SadadStatusA');
    }

    function test(){
        $cnd=auth()->user()->cond;
        $cnd1 = explode(',', $cnd);
        dd($cnd1);
    }
    function deleteuser($id){
        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Delete the user
            $user->delete();

            return back()->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Illuminate\Support\Facades\Log::error('Error deleting user: ' . $e->getMessage());

            // Handle other exceptions or return an error message
            return back()->with('error', 'An error occurred while deleting the user');
        }
    }
    function alluser(){
        $currentUser = Auth::user();
        $users = User::where('id', '!=', 1)
                  ->where('id', '!=', $currentUser->id)
                  ->get();
        return view('alluser')->with('users', $users);
    }
    function SadadCheck(){

        $data = Data::where('paid', '2')
                  ->get();
        return view('SadadCheck')->with('data', $data);
    }
    function SadadSent(){

        $data = Data::where('paid', '1')
                  ->get();
        return view('SadadSent')->with('data', $data);
    }
    function SadadRejct(){

        $data = Data::where('paid', '3')
                  ->get();
        return view('SadadRejct')->with('data', $data);
    }
    function SadadStatus(){

        $data = Data::where('paid','2')
                    ->whereNull('paidbya')
                    ->get();
        return view('SadadStatus')->with('data', $data);
    }
    function SadadPaid(){

        $data = Data::where('paid','2')
                    ->whereNotNull('paidbya')
                    ->get();
        return view('SadadPaid')->with('data', $data);
    }
    function SadadRejctA(){

        $data = Data::where('paid','3')
                    ->whereNull('paidbya')
                    ->get();
        return view('SadadRejctA')->with('data', $data);
    }
    function AddData(){
        return view('AddData');
    }
    function rvdelivery(){
        return view('rvdelivery');
    }
    function archive(){
        return view('archive');
    }
    function CheckHSBC(){
        return view('CheckHSBC');
    }
    function AddALJUF(){
        $latestRecord = Aljuf::whereNotNull('created_at')->latest()->first();

        if ($latestRecord) {
            $latestDate ='By ' .$latestRecord->name . ' in ' . Carbon::parse($latestRecord->created_at)->addHours(3)->format('Y-m-d H:i:s');
        } else {
            $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
        }
        return view('AddALJUF')->with('latestDate', $latestDate);
    }
    function dashboardC(){
        $Data = Data::all();
        $counttr2 = Data::whereNotNull('status')->whereNotNull('stuser2')->count();
        $countpo1 = Data::whereNotNull('status')->whereNotNull('stuser2')->whereNull('check')->count();
        $counttr1 = Data::whereNotNull('status')->whereNotNull('stuser2')->whereNotNull('check')->count();


        return view('DashboardC')->with('Data',$Data)->with('countpo1',$countpo1)->with('counttr1',$counttr1)->with('counttr2',$counttr2);
    }
    public function importimage(Request $request)
{


    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Save the image

    $request->file->move(public_path('img'), 'body.jpg');

    $data = [
        'name' => Auth::user()->name,
    ];

    Aljuf::create($data);

    // Save the image details to the database

    return redirect()->back()->with('success', 'Image saved successfully.');
}
    function ViewData(){
        $latestRecord = Update::whereNotNull('created_at')->latest()->first();

            if ($latestRecord) {
                $latestDate ='By ' .$latestRecord->name . ' in ' . Carbon::parse($latestRecord->created_at)->addHours(3)->format('Y-m-d H:i:s');
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

                $userData = [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('pass')),
                    'role' => $request->input('role'),
                    'cond' => $request->input('cond'),
                ];

                // Check if role is 1 (Admin)
                if ($request->input('role') == 1) {
                    $userData['aduser'] = $request->has('aduser') ? 1 : 0;
                    $userData['addata'] = $request->has('addata') ? 1 : 0;
                    $userData['adjuf'] = $request->has('adjuf') ? 1 : 0;
                    $userData['rmvgt'] = $request->has('rmvgt') ? 1 : 0;
                }
                if ($request->input('archive') == 1) {
                    $userData['archive'] = $request->has('archive') ? 1 : 0;

                }

                User::create($userData);

                return redirect()->back()->with('success', 'Data inserted successfully.');
            }
            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Name already exists Or Password not match');
            }
        }
        function actionA(Request $request)
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
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td >
                                    <a class="button-32"  href="/Show/'.encrypt($row->bildoc).'">Show</a>
                                </td>
                                <td colspan="6">
                                <a href="javascript:void(0);" onclick="return showConfirm('.$row->bildoc.')">
                                <button class="button-32"  style="background-color:blue;color:white" type="button">Delivery</button>
                                </a>
                                </td>
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
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td >
                                    <a class="button-32"  href="/Show/'.encrypt($row->bildoc).'">Show</a>
                                </td>
                                <td colspan="6">
                                <a href="javascript:void(0);" onclick="return showConfirm('.$row->bildoc.')">
                                    <button class="button-32" style="background-color:blue;color:white" type="button">Delivery</button>
                                </a>
                                </td>
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
        function actionAdmin(Request $request)
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
                        ->whereNotNull('status')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->whereNotNull('status')
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32"  href="/ShowForAdmin/'.encrypt($row->bildoc).'">Show</a></td>
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
                        ->whereNotNull('status')
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                            ->whereIn('plantkey', $cnd1)
                            ->whereNotNull('status')
                            ->groupBy('bildoc')
                            ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32" href="/ShowForAdmin/'.encrypt($row->bildoc).'">Show</a></td>
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
        function actionA1(Request $request)
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
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32"  href="/ShowForA1/'.encrypt($row->bildoc).'">Show</a></td>
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
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32" href="/ShowForA1/'.encrypt($row->bildoc).'">Show</a></td>
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
                        ->where('stuser2', 1)
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                        ->where('stuser2', 1)
                        ->whereIn('bildoc', function ($query) {
                            $query->select('bildoc')
                                ->from('data')
                                ->groupBy('bildoc')
                                ->whereNull('check');
                        })
                        ->groupBy('bildoc')
                        ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32"  href="/ShowForB/'.encrypt($row->bildoc).'">Show</a></td>
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
                        ->where('stuser2', 1)
                        ->groupBy('bildoc')
                        ->get();


                    }
                    else {
                        $data = DB::table('data')
                        ->where('stuser2', 1)
                        ->whereIn('plantkey', $cnd1)
                        ->whereIn('bildoc', function ($query) {
                            $query->select('bildoc')
                                ->from('data')
                                ->groupBy('bildoc')
                                ->whereNull('check');
                        })
                        ->groupBy('bildoc')
                        ->get();
                    }

                    $total_row = $data->count();
                    if($total_row > 0){
                        foreach($data as $row)
                        {
                            $output .= '
                            <tr>
                                <td>'.$row->plantkey.'</td>
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td colspan="2">'.\Carbon\Carbon::createFromFormat("Y-m-d", "1900-01-01")->addDays($row->bildt - 2)->format("Y-m-d") .'</td>
                                <td><a class="button-32" href="/ShowForB/'.encrypt($row->bildoc).'">Show</a></td>
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
        $typeid = decrypt($id);
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

        $result1 = DB::table('data')
        ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(stuser2) as total_status'))
        ->where('bildoc', $typeid) // Add this line to filter out null statuses
        ->first();

            $totalRows1 = $result1->total_rows;
            $totalFf1 = $result1->total_status;

            if ($totalRows1 > 0 && $totalRows1 == $totalFf1) {
                $status1 = 1;
            } elseif ($totalFf1 != '' && $totalRows1 != $totalFf1) {

                $status1 = 2;
            }
            else{
                $status1 = 3;
            }
            $userinfo = Data::where('bildoc', $typeid)
            ->whereNotNull('status')
            ->GroupBy('dateset') // Order by date in ascending order
            ->get();
            $userinfo2 = Data::where('bildoc', $typeid)
            ->whereNotNull('stuser2')
            ->GroupBy('dateuser2') // Order by date in ascending order
            ->get();
                $title = Data::where('bildoc',$typeid)->first();
                $data = Data::where('bildoc',$typeid)->get();
                $datauser = ContratUser::get();
                $port = Port::get();
                $brand = Brand::get();

            $sumAmount = Data::where('bildoc', $typeid)->sum('amount');
        return view('Show')->with('data',$data)->with('sumAmount',$sumAmount)->with('brand',$brand)->with('port',$port)->with('datauser',$datauser)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
        }
    function ShowForAdmin($id){
        $typeid = decrypt($id);
        $results = DB::table('data')
            ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(status) as total_status'))
            ->where('bildoc', $typeid)
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

        $result1 = DB::table('data')
        ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(stuser2) as total_status'))
        ->where('bildoc', $typeid)
        ->first();

            $totalRows1 = $result1->total_rows;
            $totalFf1 = $result1->total_status;

            if ($totalRows1 > 0 && $totalRows1 == $totalFf1) {
                $status1 = 1;
            } elseif ($totalFf1 != '' && $totalRows1 != $totalFf1) {

                $status1 = 2;
            }
            else{
                $status1 = 3;
            }
            $userinfo = Data::where('bildoc', $typeid)
            ->whereNotNull('status')
            ->GroupBy('dateset') // Order by date in ascending order
            ->get();
            $userinfo2 = Data::where('bildoc', $typeid)
            ->whereNotNull('stuser2')
            ->GroupBy('dateuser2') // Order by date in ascending order
            ->get();
                $title = Data::where('bildoc',$typeid)->first();
                $data = Data::where('bildoc',$typeid)->get();
                $datauser = ContratUser::get();
                $port = Port::get();
                $brand = Brand::get();

            $sumAmount = Data::where('bildoc', $typeid)->sum('amount');
        return view('ShowForAdmin')->with('data',$data)->with('sumAmount',$sumAmount)->with('brand',$brand)->with('port',$port)->with('datauser',$datauser)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
        }
    function ShowForA1($id){
        $typeid = decrypt($id);
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
        $result1 = DB::table('data')
            ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(stuser2) as total_status'))
            ->where('bildoc', $typeid) // Add this line to filter out null statuses
            ->first();



        $totalRows1 = $result1->total_rows;
        $totalFf1 = $result1->total_status;

        if ($totalRows1 > 0 && $totalRows1 == $totalFf1) {
            $status1 = 1;
        } elseif ($totalFf1 != '' && $totalRows1 != $totalFf1) {

            $status1 = 2;
        }
        else{
            $status1 = 3;
        }
        $userinfo = Data::where('bildoc', $typeid)
        ->whereNotNull('status')
        ->GroupBy('dateset') // Order by date in ascending order
        ->get();
        $userinfo2 = Data::where('bildoc', $typeid)
        ->whereNotNull('stuser2')
        ->GroupBy('dateuser2') // Order by date in ascending order
        ->get();
        $title = Data::where('bildoc',$typeid)->first();
        $data = Data::where('bildoc',$typeid)->get();
        $datauser = ContratUser::get();
        $port = Port::get();
        $brand = Brand::get();
        $sumAmount = Data::where('bildoc', $typeid)->sum('amount');
        return view('ShowForA1')->with('sumAmount',$sumAmount)->with('data',$data)->with('brand',$brand)->with('port',$port)->with('datauser',$datauser)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
        }
    function ShowForB($id){
        $typeid = decrypt($id);
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
        $result1 = DB::table('data')
        ->select(DB::raw('COUNT(*) as total_rows'), DB::raw('SUM(stuser2) as total_status'))
        ->where('bildoc', $typeid) // Add this line to filter out null statuses
        ->first();



    $totalRows1 = $result1->total_rows;
    $totalFf1 = $result1->total_status;

    if ($totalRows1 > 0 && $totalRows1 == $totalFf1) {
        $status1 = 1;
    } elseif ($totalFf1 != '' && $totalRows1 != $totalFf1) {

        $status1 = 2;
    }
    else{
        $status1 = 3;
    }
    $userinfo = Data::where('bildoc', $typeid)
    ->whereNotNull('status')
    ->GroupBy('dateset') // Order by date in ascending order
    ->get();
    $userinfo2 = Data::where('bildoc', $typeid)
    ->whereNotNull('stuser2')
    ->GroupBy('dateuser2') // Order by date in ascending order
    ->get();
        $title = Data::where('bildoc',$typeid)->first();
        $data = Data::where('bildoc',$typeid)->orderBy('status', 'desc')->get();
        $sumAmount = Data::where('bildoc', $typeid)->sum('amount');
        return view('ShowForB')->with('sumAmount',$sumAmount)->with('data',$data)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
        }

        function Status($id){
            DB::table('data')
            ->where('bildoc', $id) // Assuming $id is the ID of the product you want to update
            ->update([
                'nameuser' => Auth::user()->name,
                'dateset' =>  Carbon::now('Asia/Riyadh'),
                'status' => 1,
            ]);
            return redirect()->back()->with('success', 'Successfully.');
        }
        function TotalRestore(Request $request){
            $id = $request->input('bildoc');
            DB::table('data')
            ->where('bildoc', $id) // Assuming $id is the ID of the product you want to update
            ->update([
                'nameuser' => null,
                'dateset' => null,
                'status' => null,
                'user2' => null,
                'dateuser2' => null,
                'stuser2' => null,
                'usercheck' => null,
                'check' => null,
                'datecheck' => null,
                'removeby' => Auth::user()->name,
                'remove' => 1,
                'dateremove' => Carbon::now('Asia/Riyadh'),
                'reason' => $request->input('reason'),
            ]);
            return redirect()->back()->with('success', 'Successfully.');
        }

        function TotalCheckA1($id){
            DB::table('data')
            ->where('bildoc',$id)
            ->whereNotNull('status')
            ->whereNull('stuser2')
            ->update([
                'user2' => Auth::user()->name,
                'dateuser2' =>  Carbon::now('Asia/Riyadh'),
                'stuser2' => 1,
            ]);
            return redirect()->back()->with('success', 'Successfully.');
        }
        function StatusA1($id){
            DB::table('data')
            ->where('bildoc', $id) // Assuming $id is the ID of the product you want to update
            ->update([
                'user2' => Auth::user()->name,
                'dateuser2' =>  Carbon::now('Asia/Riyadh'),
                'stuser2' => 1,
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
                        'dateset' =>  Carbon::now('Asia/Riyadh'),
                        'status' => 1,
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
        function SemiRemove(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'nameuser' => null,
                        'dateset' => null,
                        'status' => null,
                        'user2' => null,
                        'dateuser2' => null,
                        'stuser2' => null,
                        'usercheck' => null,
                        'check' => null,
                        'datecheck' => null,
                        'removeby' => Auth::user()->name,
                        'remove' => 1,
                        'dateremove' => Carbon::now('Asia/Riyadh'),
                        'reason' => $request->input('reason'),
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
        function SemiCheckA1(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'user2' => Auth::user()->name,
                        'dateuser2' =>  Carbon::now('Asia/Riyadh'),
                        'stuser2' => 1,
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
        function done(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'done' => 1,
                        'reference' =>  $request->input('reference'),
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
        function Paid(Request $request){
                $selectedItems = $request->input('selectedItems'); // Assuming you add a name attribute to the checkboxes
                if(empty($selectedItems)) {
                    return redirect()->back()->with('error', 'No items selected for update.');
                }
                foreach($selectedItems as $itemId) {
                    Data::where('id', $itemId)->update([
                        'paidbya' => 1,

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
                        'datecheck' =>  Carbon::now('Asia/Riyadh'),
                    ]);
                }

                return redirect()->back()->with('success', 'Selections updated successfully');
            }
            function Showsetuser($nameuser, $boldoc,$dateset){
                $bol=decrypt($boldoc);
                $title = Data::where('bildoc',$bol)->first();
                $data = Data::where('nameuser', $nameuser)->where('bildoc',$bol)->where('dateset',$dateset)->get();
                return view('Showsetuser')->with('data',$data)->with('title',$title);
            }
            function ShowsetuserA1($user2, $boldoc,$dateuser2){
                $bol=decrypt($boldoc);
                $title = Data::where('bildoc',$bol)->first();
                $data = Data::where('user2', $user2)->where('bildoc',$bol)->where('dateuser2',$dateuser2)->get();
                return view('Showsetuser')->with('data',$data)->with('title',$title);
            }
            function SowChekUser($boldoc){
                $bol=decrypt($boldoc);
                $data = Data::where('bildoc',$bol)->where('check',1)->orderBy('datecheck', 'desc')->get();
                return view('SowChekUser')->with('data',$data);
            }
            function SowChekUserA1($boldoc){
                $bol=decrypt($boldoc);
                $data = Data::where('bildoc',$bol)->where('stuser2',1)->orderBy('datecheck', 'desc')->get();
                return view('SowChekUserA1')->with('data',$data);
            }
            function SowChekUserA($boldoc){
                $bol=decrypt($boldoc);
                $data = Data::where('bildoc',$bol)->where('status',1)->orderBy('datecheck', 'desc')->get();
                return view('SowChekUserA')->with('data',$data);
            }

                public function export($conditionValue)
                {
                    $data = new DataExport($conditionValue);

                    if ($data->collection()->isEmpty()) {
                        return back()->with('error', 'No data found for export.');
                    }

                    return Excel::download($data, 'Gt-Number.xlsx');
                }
            function ShowUpdateData()
            {
                $data= Update::get();
                return view('ShowUpdateData')->with('data',$data);
            }
           function SemiExportGT(Request $request)
{
    try {
        $selectedItems = $request->input('selectedItems');
        $alldata = 'GTEXPORT';

        if (!$selectedItems) {
            throw new \Exception('No items selected for export.');
        }

        foreach($selectedItems as $itemId) {
            Data::where('id', $itemId)->update([
                'printed' => 1,
            ]);
        }

        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
    }
}
            function SemiExport(Request $request)
            {
                if($request->input('ob')){
                    try {
                        $selectedItems = $request->input('selectedItems');
                        $alldata = $request->input('ob');

                        if (!$selectedItems) {
                            throw new \Exception('No items selected for export.');
                        }

                        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
                    } catch (\Exception $e) {
                        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
                    }
                }
                if($request->input('A1')){
                    try {
                        $selectedItems = $request->input('selectedItems');
                        $alldata = $request->input('ob');

                        if (!$selectedItems) {
                            throw new \Exception('No items selected for export.');
                        }

                        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
                    } catch (\Exception $e) {
                        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
                    }
                }

                if($request->input('alldata')){
                    try {
                        $selectedItems = $request->input('selectedItems');
                        $alldata = $request->input('alldata');
                        if (!$selectedItems) {
                            throw new \Exception('No items selected for export.');
                        }

                        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
                    } catch (\Exception $e) {
                        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
                    }
                }
                if($request->input('sadad')){

                    try {
                        $selectedItems = $request->input('selectedItems');
                        $firstId = $selectedItems[0];
                        $firstRecord = Data::find($firstId);
                        $alldata = $firstRecord->paidtype;
                        if (!$selectedItems) {
                            throw new \Exception('No items selected for export.');
                        }

                        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
                    } catch (\Exception $e) {
                        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
                    }
                }
                else{
                    try {
                        $selectedItems = $request->input('selectedItems');
                        $alldata = '';
                        if (!$selectedItems) {
                            throw new \Exception('No items selected for export.');
                        }

                        return Excel::download(new DataSemiExport($selectedItems, $alldata), 'Gt-Number.xlsx');
                    } catch (\Exception $e) {
                        return back()->with('error', 'An error occurred while exporting the data: ' . $e->getMessage());
                    }
                }



            }
            public function getLiveValue()
            {
               if(auth()->user()->cond !== Null){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $latestRecord = Update::whereNotNull('created_at')->latest()->first();

                    if ($latestRecord) {
                        $latestDate = Carbon::parse($latestRecord->created_at)->addHours(3)->format('Y-m-d H:i:s');
                    } else {
                        $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
                    }
                    $liveValue = Data::whereNull('check')->where('status', 1)->whereIn('plantkey', $cnd1)->where('stuser2', 1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNull('check')->where('status', 1)->where('stuser2', 1)->whereIn('plantkey', $cnd1)->latest('dateset')->value('dateset');
                    return response()->json(['value' => $liveValue, 'up' => $up, 'date' => $latestDate]);

                }
                else
                {
                    $latestRecord = Update::whereNotNull('created_at')->latest()->first();

                    if ($latestRecord) {
                        $latestDate =Carbon::parse($latestRecord->created_at)->addHours(3)->format('Y-m-d H:i:s');
                    } else {
                        $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
                    }
                    $liveValue = Data::whereNull('check')->where('status', 1)->where('stuser2', 1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNull('check')->where('status', 1)->where('stuser2', 1)->latest('dateset')->value('dateset');

                    return response()->json(['value' => $liveValue, 'up' => $up, 'date' => $latestDate]);
                }
            }
            public function NumNonCheck()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                $cnd=auth()->user()->cond;
                $cnd1 = explode(',', $cnd);
                $liveValue = Data::whereNotNull('check')->whereIn('plantkey', $cnd1)->where('stuser2', 1)->count(); // Replace YourModel and $id with your actual model and ID
                $up= Data::whereNotNull('check')->where('stuser2', 1)->latest('dateuser2')->value('dateuser2');
                return response()->json(['value' => $liveValue, 'up' => $up]);

                }
                else
                {
                    $liveValue = Data::whereNotNull('check')->where('stuser2', 1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('check')->where('stuser2', 1)->latest('dateuser2')->value('dateuser2');
                    return response()->json(['value' => $liveValue, 'up' => $up]);
                }

            }
            public function NumCheckA()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                $cnd=auth()->user()->cond;
                $cnd1 = explode(',', $cnd);
                $liveValue = Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                $up= Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->latest('dateset')->value('dateset');
                $liveValue1 = Data::where('paid', '1')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                $up1= Data::where('paid', '1')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                $liveValue2 = Data::where('paid','!=', '1')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                $up2= Data::where('paid','!=', '1')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                return response()->json(['value' => $liveValue, 'up' => $up,'value1' => $liveValue1, 'up1' => $up1,'value2' => $liveValue2, 'up2' => $up2]);

                }
                else
                {
                    $liveValue = Data::whereNotNull('status')->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('status')->latest('dateset')->value('dateset');
                    $liveValue1 = Data::where('paid', '1')->count(); // Replace YourModel and $id with your actual model and ID
                    $up1= Data::where('paid', '1')->latest('datepaid')->value('datepaid');
                    $liveValue2 = Data::where('paid','!=', '1')->count(); // Replace YourModel and $id with your actual model and ID
                $up2= Data::where('paid','!=', '1')->latest('datepaid')->value('datepaid');
                    return response()->json(['value' => $liveValue, 'up' => $up,'value1' => $liveValue1, 'up1' => $up1,'value2' => $liveValue2, 'up2' => $up2]);
                }

            }
            public function archivelive()
            {
                if (auth()->user()->cond != Null && auth()->user()->cond !== '0') {
                    $cnd = auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);

                    // Count for devices with status
                    $ctdev = Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->count();

                    // Count for sent data
                    $ctsent = Data::whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->count();

                    // Count for items with 'check'
                    $istimarah = Data::whereNotNull('check')->whereIn('plantkey', $cnd1)->count();

                    // Latest dates for each category
                    $datectdev = Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->latest('dateset')->value('dateset');
                    $datectsent = Data::whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->latest('dateuser2')->value('dateuser2');
                    $dateistimarah = Data::whereNotNull('check')->whereIn('plantkey', $cnd1)->latest('datecheck')->value('datecheck');

                    return response()->json([
                        'ctdev' => $ctdev,
                        'ctsent' => $ctsent,
                        'istimarah' => $istimarah,
                        'datectdev' => $datectdev,
                        'datectsent' => $datectsent,
                        'dateistimarah' => $dateistimarah,
                    ]);

                } else {
                   $ctdev = Data::whereNotNull('status')->count();

                    // Count for sent data
                    $ctsent = Data::whereNotNull('stuser2')->count();

                    // Count for items with 'check'
                    $istimarah = Data::whereNotNull('check')->count();

                    // Latest dates for each category
                    $datectdev = Data::whereNotNull('status')->latest('dateset')->value('dateset');
                    $datectsent = Data::whereNotNull('stuser2')->latest('dateuser2')->value('dateuser2');
                    $dateistimarah = Data::whereNotNull('check')->latest('datecheck')->value('datecheck');

                    return response()->json([
                        'ctdev' => $ctdev,
                        'ctsent' => $ctsent,
                        'istimarah' => $istimarah,
                        'datectdev' => $datectdev,
                        'datectsent' => $datectsent,
                        'dateistimarah' => $dateistimarah,
                    ]);
                }


            }
            public function archivestatsgtdelivered()
            {
                if (auth()->user()->cond != Null && auth()->user()->cond !== '0') {

                    $cnd = auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->get();
                    return view('archivestats')->with('data',$data);

                } else {

                    $data = Data::whereNotNull('status')->get();
                    return view('archivestats')->with('data',$data);
                }


            }
            public function archivestatsgtsttrafic()
            {
                if (auth()->user()->cond != Null && auth()->user()->cond !== '0') {

                    $cnd = auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->get();
                    return view('archivestats')->with('data',$data);

                } else {

                    $data = Data::whereNotNull('stuser2')->get();
                    return view('archivestats')->with('data',$data);
                }


            }
            public function archivestatsiostimarah()
            {
                if (auth()->user()->cond != Null && auth()->user()->cond !== '0') {

                    $cnd = auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('check')->whereIn('plantkey', $cnd1)->get();
                    return view('archivestats')->with('data',$data);

                } else {

                    $data = Data::whereNotNull('check')->get();
                    return view('archivestats')->with('data',$data);
                }


            }
            public function NumRemoveAdmin()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                $cnd=auth()->user()->cond;
                $cnd1 = explode(',', $cnd);
                $liveValue = Data::whereNotNull('remove')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                $up= Data::whereNotNull('remove')->latest('dateremove')->value('dateremove');
                return response()->json(['value' => $liveValue, 'up' => $up]);

                }
                else
                {
                    $liveValue = Data::where('remove','1')->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('dateremove')->latest('dateremove')->value('dateremove');
                    return response()->json(['value' => $liveValue, 'up' => $up]);
                }

            }
            public function dateup()
            {
                $latestRecord = Update::whereNotNull('created_at')->latest()->first();

                if ($latestRecord) {
                    $latestDate = Carbon::parse($latestRecord->created_at)->addHours(3)->format('Y-m-d H:i:s');
                } else {
                    $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
                }
                return response()->json(['date' => $latestDate]);
            }
            public function notcheck()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNull('check')->whereIn('plantkey', $cnd1)->where('status', 1)->where('stuser2', 1)->get();
                return view('notcheck')->with('data',$data);

                }
                else
                {
                    $data = Data::whereNull('check')->where('status', 1)->where('stuser2', 1)->get();
                    return view('notcheck')->with('data',$data);
                }

            }
            public function notchecktr()
            {
                $plantKeysWithCounts = Data::whereNotNull('status')->whereNotNull('stuser2')->whereNotNull('check')
                ->select('plantkey', \DB::raw('count(*) as count'))
                ->groupBy('plantkey')
                ->get();
                $data = Data::whereNotNull('check')->get();
                $tp='tp3';
                $result = Data::whereNotNull('check')
                ->selectRaw('COUNT(stuser2) as num, plantkey')
                ->groupBy('plantkey')
                ->get();
                $chart='';
                foreach ( $result as $item){
                    $chart.="['".$item->plantkey."',".$item->num."],";
                }

                $result2 = Data::whereNotNull('stuser2')->whereNotNull('check')
                ->selectRaw('COUNT(`check`) as num, DATE(datecheck) as day')
                ->groupBy('day')
                ->get();
                $chart2='';
                foreach ( $result2 as $item){
                    $chart2.="['".$item->day."',".$item->num."],";
                }

                return view('Stats')->with('data',$data)->with('chart',$chart)->with('chart2',$chart2)->with('tp',$tp)->with('plantKeysWithCounts',$plantKeysWithCounts);
            }
            public function notcheckob()
            {
                $plantKeysWithCounts = Data::whereNotNull('status')->whereNotNull('stuser2')->whereNull('check')
                ->select('plantkey', \DB::raw('count(*) as count'))
                ->groupBy('plantkey')
                ->get();
                $data = Data::whereNotNull('status')->whereNotNull('stuser2')->whereNull('check')->get();
                $tp='tp2';
                $result = Data::whereNotNull('status')
                            ->whereNotNull('stuser2')
                            ->whereNull('check')
                            ->selectRaw('COUNT(*) as num, plantkey')
                            ->groupBy('plantkey')
                            ->get();
                $chart='';
                foreach ( $result as $item){
                    $chart.="['".$item->plantkey."',".$item->num."],";
                }
                $result2 = Data::whereNotNull('status')
                ->whereNotNull('stuser2')
                ->whereNull('check')
                ->selectRaw('COUNT(stuser2) as num, DATE(dateuser2) as day')
                ->groupBy('day')
                ->get();
                $chart2='';
                foreach ( $result2 as $item){
                    $chart2.="['".$item->day."',".$item->num."],";
                }

                return view('Stats')->with('data',$data)->with('chart',$chart)->with('chart2',$chart2)->with('tp',$tp)->with('plantKeysWithCounts',$plantKeysWithCounts);
            }
            public function checktr()
            {
                $plantKeysWithCounts = Data::whereNotNull('status')->whereNotNull('stuser2')
                ->select('plantkey', \DB::raw('count(*) as count'))
                ->groupBy('plantkey')
                ->get();
                $data = Data::whereNotNull('status')->whereNotNull('stuser2')->get();
                $tp='tp1';
                $result = Data::selectRaw('COUNT(stuser2) as num, plantkey')
                      ->groupBy('plantkey')
                      ->get();
                $chart='';
                foreach ( $result as $item){
                    $chart.="['".$item->plantkey."',".$item->num."],";
                }

                $result2 = Data::whereNotNull('stuser2')
                ->selectRaw('COUNT(stuser2) as num, DATE(dateuser2) as day')
                ->groupBy('day')
                ->get();
                $chart2='';
                foreach ( $result2 as $item){
                    $chart2.="['".$item->day."',".$item->num."],";
                }

                return view('Stats')->with('data',$data)->with('chart',$chart)->with('chart2',$chart2)->with('tp',$tp)->with('plantKeysWithCounts',$plantKeysWithCounts);
            }
            public function Setcheck()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('check')->whereIn('plantkey', $cnd1)->get();
                    return view('Setcheck')->with('data',$data);

                }
                else
                {
                    $data = Data::whereNotNull('check')->get();
                    return view('Setcheck')->with('data',$data);
                }


            }
            public function NonCheckItems()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('status')->whereNull('stuser2')->whereIn('plantkey', $cnd1)->get();
                    return view('NonCheckItems')->with('data',$data);

                }
                else
                {
                    $data = Data::whereNotNull('status')->whereNull('stuser2')->get();
                    return view('NonCheckItems')->with('data',$data);
                }

            }
            public function CheckItemsA()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('status')->whereIn('plantkey', $cnd1)->get();
                    return view('CheckItemsA')->with('data',$data);

                }
                else
                {
                    $data = Data::whereNotNull('status')->get();
                    return view('CheckItemsA')->with('data',$data);
                }

            }
            public function SadadA()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::where('paid', '1')->whereIn('plantkey', $cnd1)->get();
                    return view('SadadA')->with('data',$data);

                }
                else
                {
                    $data = Data::where('paid', '1')->get();
                    return view('SadadA')->with('data',$data);
                }

            }
            public function RmoveItems()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::where('remove',1)->whereIn('plantkey', $cnd1)->get();
                    return view('RmoveItems')->with('data',$data);

                }
                else
                {
                    $data = Data::where('remove',1)->get();
                    return view('RmoveItems')->with('data',$data);
                }

            }
            public function CheckItemsA1()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $data = Data::whereNotNull('status')->whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->get();
                    return view('CheckItemsA1')->with('data',$data);

                }
                else
                {
                    $data = Data::whereNotNull('status')->whereNotNull('stuser2')->get();
                    return view('CheckItemsA1')->with('data',$data);
                }

            }


            public function Noncheck()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $liveValue = Data::whereNotNull('status')->whereNull('stuser2')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('status')->whereNull('stuser2')->whereIn('plantkey', $cnd1)->latest('dateset')->value('dateset');
                }else
                {
                    $liveValue = Data::whereNotNull('status')->whereNull('stuser2')->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('status')->whereNull('stuser2')->latest('dateset')->value('dateset');
                }

                return response()->json(['value' => $liveValue, 'up' => $up]);
            }
            public function CheckA1()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $liveValue = Data::whereNotNull('status')->whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('status')->whereNotNull('stuser2')->whereIn('plantkey', $cnd1)->latest('dateset')->value('dateset');
                    $liveValue2 = Data::whereNotNull('paid')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::whereNotNull('paid')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                }else
                {
                    $liveValue = Data::whereNotNull('status')->whereNotNull('stuser2')->count(); // Replace YourModel and $id with your actual model and ID
                    $up= Data::whereNotNull('status')->whereNotNull('stuser2')->latest('dateset')->value('dateset');
                    $liveValue2 = Data::whereNotNull('paid')->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::whereNotNull('paid')->latest('datepaid')->value('datepaid');
                }

                return response()->json(['value' => $liveValue, 'up' => $up,'value2' => $liveValue2, 'up2' => $up2]);
            }
            public function Sadadlive()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $paidValues = ['2', '22'];
                    $liveValue = Data::where('paid',$paidValues)->whereIn('plantkey', $cnd1)->count();
                    $up= Data::where('paid',$paidValues)->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                    $liveValue2 = Data::where('paid','1')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::where('paid','1')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                    $liveValue3 = Data::where('paid','3')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up3= Data::where('paid','3')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                }else
                {
                    $paidValues = ['2', '22'];
                    $liveValue = Data::where('paid',$paidValues)->count();
                    $up= Data::where('paid',$paidValues)->latest('datepaid')->value('datepaid');
                    $liveValue2 = Data::where('paid','1')->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::where('paid','1')->latest('datepaid')->value('datepaid');
                    $liveValue3 = Data::where('paid','3')->count(); // Replace YourModel and $id witsh your actual model and ID
                    $up3= Data::where('paid','3')->latest('datepaid')->value('datepaid');
                }

                return response()->json(['value' => $liveValue, 'up' => $up,'value2' => $liveValue2, 'up2' => $up2,'value3'  => $liveValue3, 'up3' => $up3]);
            }

            public function Sadadlive2()
            {
                if(auth()->user()->cond != Null && auth()->user()->cond !== '0'){
                    $cnd=auth()->user()->cond;
                    $cnd1 = explode(',', $cnd);
                    $paidValues = ['2', '22'];
                    $liveValue = Data::where('paid',$paidValues)->where('paidby','!=','1')->whereIn('plantkey', $cnd1)->count();
                    $up= Data::where('paid',$paidValues)->where('paidby','!=','1')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                    $liveValue2 = Data::where('paidbya','1')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::where('paidbya','1')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                    $liveValue3 = Data::where('paid','3')->whereIn('plantkey', $cnd1)->count(); // Replace YourModel and $id with your actual model and ID
                    $up3= Data::where('paid','3')->whereIn('plantkey', $cnd1)->latest('datepaid')->value('datepaid');
                }else
                {
                    $paidValues = ['2', '22'];
                    $liveValue = Data::where('paid',$paidValues)->where('paidby','!=','1')->count();
                    $up= Data::where('paid',$paidValues)->where('paidby','!=','1')->latest('datepaid')->value('datepaid');
                    $liveValue2 = Data::where('paidbya','1')->count(); // Replace YourModel and $id with your actual model and ID
                    $up2= Data::where('paidbya','1')->latest('datepaid')->value('datepaid');
                    $liveValue3 = Data::where('paid','3')->count(); // Replace YourModel and $id witsh your actual model and ID
                    $up3= Data::where('paid','3')->latest('datepaid')->value('datepaid');
                }

                return response()->json(['value' => $liveValue, 'up' => $up,'value2' => $liveValue2, 'up2' => $up2,'value3'  => $liveValue3, 'up3' => $up3]);
            }

            public function getlast()
            {
                $liveValue = Update::latest('created_at')->value('name');
                $up=  Update::latest()->value('created_at');
                return response()->json(['value' => $liveValue, 'up' => $up]);
            }
            public function AddContrat()
            {
                $user = ContratUser::get();

                $port = Port::get();
                $brand = Brand::get();
                $color = ColorCode::get();
                return view('AddContrat')->with('user',$user)->with('port',$port)->with('color',$color)->with('brand',$brand);
            }
            public function AddContratUser(Request $request)
            {

                $owner = new ContratUser();
                $owner->name = $request->input('full_name');
                $owner->nat = $request->input('nationality');
                $owner->nat_id = $request->input('national_id');
                $owner->address = $request->input('address');
                $owner->city = $request->input('city');
                $owner->wornum = $request->input('work_phone');
                $owner->activity = $request->input('activity');
                $owner->mobnum = $request->input('mobile_number');
                $owner->save();

                return redirect()->back()->with('success', 'Owner added successfully!');
            }
            public function AddPort(Request $request)
            {

                $owner = new Port();
                $owner->nameofport = $request->input('nameofport');
                $owner->save();

                return redirect()->back()->with('success', 'Owner added successfully!');
            }

            public function getUserData($id) {
                $user = ContratUser::find($id);

                return response()->json([
                    'full_name' => $user->name,
                    'nationality' => $user->nat,
                    'national_id' => $user->nat_id,
                    'address' => $user->address,
                    'city' => $user->city,
                    'work_phone' => $user->wornum,
                    'activity' => $user->activity,
                    'mobile_number' => $user->mobnum,
                ]);
            }
            public function showBrandInfo($id) {
                $user = Brand::find($id);

                return response()->json([
                    'brand' => $user->brand,
                    'model' => $user->model,
                    'modtype' => $user->modtype,
                    'chtype' => $user->chtype,
                    'vcap' => $user->vcap,
                    'numcl' => $user->numcl,
                    'weight' => $user->weight,
                    'year' => $user->year,
                ]);
            }
            public function AddBrand(Request $request)
            {

                $owner = new Brand();
                $owner->titel = $request->input('titel');
                $owner->brand = $request->input('brand');
                $owner->model = $request->input('model');
                $owner->modtype = $request->input('modtype');
                $owner->chtype = $request->input('chtype');
                $owner->vcap = $request->input('vcap');
                $owner->numcl = $request->input('numcl');
                $owner->weight = $request->input('weight');
                $owner->year = $request->input('year');
                $owner->save();

                return redirect()->back()->with('success', 'Owner added successfully!');
            }
            public function Addcolor(Request $request)
            {

                $owner = new ColorCode();
                $owner->color = $request->input('color');
                $owner->code = $request->input('code');

                $owner->save();

                return redirect()->back()->with('success', 'Owner added successfully!');
            }
           function PDF(Request $request) {
                $selectedItems = $request->input('selectedItems');

                $selectedRecords = Data::whereIn('id', $selectedItems)->get();

                foreach ($selectedRecords as $record) {
                    $colorRecord = ColorCode::where('code', $record->color)->first();

                    if ($colorRecord) {
                        $record->color = $colorRecord->color;
                    }
                }

                $requestData = $request->all();

                if (!isset($requestData['documents'])) {
                    // If not, set 'documents' to 'No'
                    $requestData['documents'] = 'No';
                }
                return view('pdf')->with([
                    'requestData' => $requestData,
                    'selectedRecord' => $selectedRecords
                ]);

                // Redirect back or return a response as needed
            }
            public function edituser(Request $request, $id)
            {
                // Validate the form data
                $request->validate([
                    'edit-name' => 'required|string|max:255',
                ]);

                // Find the user by ID
                $user = User::findOrFail($id);

                // Update the user with the form data
                $userData = [
                    'name' => $request->input('edit-name'),
                    'email' => $request->input('edit-email'),
                    'cond' => $request->input('edit-cond'),
                    'role' => $request->input('edit-role'),
                ];

                // Check if the password is not empty before updating
                if (!empty($request->input('pass'))) {
                    $userData['password'] = bcrypt($request->input('pass'));
                }
                if (!empty($request->input('archive'))) {
                    $userData['archive'] = $request->has('archive') ? '1' : '0';
                }

                // Handle additional user permissions or features based on the role
                if ($request->input('edit-role') == '1') {
                    $userData['aduser'] = $request->has('aduser') ? '1' : '0';
                    $userData['addata'] = $request->has('addata') ? '1' : '0';
                    $userData['adjuf'] = $request->has('adjuf') ? '1' : '0';
                    $userData['rmvgt'] = $request->has('rmvgt') ? '1' : '0';
                }

                $user->update($userData);

                // Redirect back with a success message
                return redirect()->back()->with('success', 'User updated successfully.');
            }

                    public function editusercontrat(Request $request)
                    {
                        // Validate the form data (customize the validation rules as needed)


                        // Get the user ID from the hidden input in the form
                        $userId = $request->input('id');

                        // Find the user in the database by ID
                        $user = ContratUser::find($userId);

                        // Update the user information
                        $user->name = $request->input('name');
                        $user->nat = $request->input('nationality');
                        $user->nat_id = $request->input('national_id');
                        $user->address = $request->input('address');
                        $user->city = $request->input('city');
                        $user->wornum = $request->input('work_phone');
                        $user->activity = $request->input('activity');
                        $user->mobnum = $request->input('mobile_number');

                        // Save the updated user information
                        $user->save();

                        // Redirect back or return a response as needed
                        return redirect()->back()->with('success', 'User information updated successfully.');
                    }
                    public function editportcontrat(Request $request)
                    {
                        // Validate the form data (customize the validation rules as needed)


                        // Get the user ID from the hidden input in the form
                        $userId = $request->input('id');

                        // Find the user in the database by ID
                        $user = Port::find($userId);

                        // Update the user information
                        $user->nameofport = $request->input('name');


                        // Save the updated user information
                        $user->save();

                        // Redirect back or return a response as needed
                        return redirect()->back()->with('success', 'User information updated successfully.');
                    }
                    public function editcolorcontrat(Request $request)
                    {
                        // Validate the form data (customize the validation rules as needed)


                        // Get the user ID from the hidden input in the form
                        $userId = $request->input('id');

                        // Find the user in the database by ID
                        $user = ColorCode::find($userId);

                        // Update the user information
                        $user->color = $request->input('color');
                        $user->code = $request->input('code');


                        // Save the updated user information
                        $user->save();

                        // Redirect back or return a response as needed
                        return redirect()->back()->with('success', 'User information updated successfully.');
                    }
                    public function editbrandcontrat(Request $request)
                    {
                        // Validate the form data (customize the validation rules as needed)


                        // Get the user ID from the hidden input in the form
                        $userId = $request->input('id');

                        // Find the user in the database by ID
                        $user = Brand::find($userId);

                        // Update the user information
                        $user->titel = $request->input('titel');
                        $user->brand = $request->input('brand');
                        $user->model = $request->input('model');
                        $user->modtype = $request->input('modtype');
                        $user->chtype = $request->input('chtype');
                        $user->vcap = $request->input('vcap');
                        $user->numcl = $request->input('numcl');
                        $user->weight = $request->input('weight');
                        $user->year = $request->input('year');

                        // Save the updated user information
                        $user->save();

                        // Redirect back or return a response as needed
                        return redirect()->back()->with('success', 'User information updated successfully.');
                    }
                    public function deleteusercontrat($id)
                        {
                            $record = ContratUser::find($id);

                            if (!$record) {
                                return redirect()->back()->with('error', 'Record not found.');
                            }

                            $record->delete();

                            return redirect()->back()->with('success', 'Record deleted successfully.');
                        }
                    public function deleteportcontrat($id)
                        {
                            $record = Port::find($id);

                            if (!$record) {
                                return redirect()->back()->with('error', 'Record not found.');
                            }

                            $record->delete();

                            return redirect()->back()->with('success', 'Record deleted successfully.');
                        }
                    public function deletebrandcontrat($id)
                        {
                            $record = Brand::find($id);

                            if (!$record) {
                                return redirect()->back()->with('error', 'Record not found.');
                            }

                            $record->delete();

                            return redirect()->back()->with('success', 'Record deleted successfully.');
                        }
                    public function deletecolorcontrat($id)
                        {
                            $record = ColorCode::find($id);

                            if (!$record) {
                                return redirect()->back()->with('error', 'Record not found.');
                            }

                            $record->delete();

                            return redirect()->back()->with('success', 'Record deleted successfully.');
                        }
                        public function importId(Request $request)
                        {
                            try {

                                // Import data from the Excel file using the IDImport class
                                Excel::import(new IDImport, $request->file('file'));

                                return back()->with('success', 'Data imported successfully');

                            }
                            catch (\Exception $e)
                            {
                                return redirect()->back()->with('error', 'Opps! A simple problem , Try Again'. $e->getMessage());
                            }


                        }
                        function Sadad(Request $request)
                        {
                            $selectedItems = $request->input('selectedItems');

                            if (empty($selectedItems)) {
                                return redirect()->back()->with('error', 'No items selected for update.');
                            }

                            // Initialize variables to track conditions
                            $allAmountsLessThanOne = true;
                            $sumOfAmountsGreaterThan1000 = 0;
                            $allPaidTypesDifferentThan1And2 = true;

                            foreach ($selectedItems as $itemId) {
                                $data = Data::find($itemId);

                                // Check if any amount is greater than 1
                                if ($data->regist < 1) {
                                    $allAmountsLessThanOne = false;
                                }

                                // Sum up amounts
                                $sumOfAmountsGreaterThan1000 += $data->regist;

                                // Check if paidtype is not 1 or 2
                                if ($data->paid === '1' || $data->paid === '2') {
                                    $allPaidTypesDifferentThan1And2 = false;
                                }
                            }

                            // Perform checks
                            if (!$allAmountsLessThanOne) {
                                return redirect()->back()->with('error', 'One or more items contain an amount less than 1 .');
                            }

                            if ($sumOfAmountsGreaterThan1000 < 1) {
                                return redirect()->back()->with('error', 'Total amounts less than 1 .');
                            }

                            if (!$allPaidTypesDifferentThan1And2) {
                                return redirect()->back()->with('error', 'One or more items were previously selected .');
                            }

                            // If all conditions are met, proceed with the update
                            foreach ($selectedItems as $itemId) {
                                Data::where('id', $itemId)->update([
                                    'paid' => 1,
                                    'paidby' => Auth::user()->name,
                                    'datepaid' => Carbon::now('Asia/Riyadh'),
                                    'paidtype' => $request->input('paidtype'),
                                ]);
                            }

                            return redirect()->route('SadadView')->with('success', 'Selections updated successfully');

                        }
                        public function processConfirmation(Request $request) {
                            $confirmationAction = $request->input('confirmation_action');

                            if ($confirmationAction === 'accept') {

                                $selectedItems = $request->input('selectedItems');

                                if (empty($selectedItems)) {
                                    return redirect()->back()->with('error', 'No items selected for update.');
                                }

                                foreach ($selectedItems as $itemId) {
                                    Data::where('id', $itemId)->update([
                                        'paid' => 2,
                                    ]);
                                }
                                return redirect()->back()->with('success', 'Selections updated successfully');
                            } elseif ($confirmationAction === 'refuse') {
                                $selectedItems = $request->input('selectedItems');

                                if (empty($selectedItems)) {
                                    return redirect()->back()->with('error', 'No items selected for update.');
                                }

                                foreach ($selectedItems as $itemId) {
                                    Data::where('id', $itemId)->update([
                                        'paid' => 3,
                                    ]);
                                }
                                return redirect()->back()->with('success', 'Selections updated successfully');
                            }


                        }
                        public function importSadad(Request $request)
                        {
                            try {
                                $import = new Sadad();
                                Excel::import($import, $request->file('file'));

                                $importedData = $import->getImportedData();

                                return view('SadadView')->with('importedData',   $importedData);
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'Oops! A simple problem. Try Again. ' . $e->getMessage());
                            }
                        }

                        public function importHSBC(Request $request)
                        {
                            // Set a time limit of 40 seconds to prevent execution timeout
                            ini_set('max_execution_time', 40);

                            try {
                                // Import data from the Excel file using the HSBCImport class
                                $import = new HSBCImport();
                                Excel::import($import, $request->file('file'));
                                $importedData = $import->getImportedData();

                                return view('/CheckHSBC', ['importedData' => $importedData]);

                            } catch (\Exception $e) {
                                // Handle exceptions, including execution timeout
                                if ($e instanceof \RuntimeException && $e->getCode() == 28) {
                                    // Execution timeout error
                                    return back()->with('error', 'Execution time exceeded. Please reduce the size of your Excel file or increase the memory limit.');
                                } else {
                                    // Other exceptions
                                    return back()->with('error', 'Oops! A simple problem. Try Again. ' . $e->getMessage());
                                }
                            }
                        }





}
