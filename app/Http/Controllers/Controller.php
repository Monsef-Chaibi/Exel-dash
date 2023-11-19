<?php

namespace App\Http\Controllers;
use App\Models\Aljuf;
use App\Models\ColorCode;
use PDF;
use App\Exports\DataExport;
use App\Exports\DataSemiExport;
use App\Imports\DataImport;
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
        $users = User::where('role', '!=', 1)->get();
        return view('alluser')->with('users', $users);
    }
    function AddData(){
        return view('AddData');
    }
    function AddALJUF(){
        $latestRecord = Aljuf::whereNotNull('created_at')->latest()->first();

        if ($latestRecord) {
            $latestDate ='By ' .$latestRecord->name . ' in ' . $latestRecord->created_at;
        } else {
            $latestDate = '00:00' ;// Set the time to 00:00:00 if no records exist
        }
        return view('AddALJUF')->with('latestDate', $latestDate);
    }
    function dashboardC(){
        $Data = Data::all();
        $count1 = Data::whereNull('stuser2')
        ->where('status', 1)
        ->count();
        $count2 = Data::whereNull('check')
        ->where('status', 1)
        ->where('stuser2', 1)
        ->count();

        return view('DashboardC')->with('Data',$Data)->with('count2',$count2)->with('count1',$count1);
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
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
                                <td><a class="button-32"  href="/Show/'.encrypt($row->bildoc).'">Show</a></td>
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
                                <td><a class="button-32" href="/Show/'.encrypt($row->bildoc).'">Show</a></td>
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
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
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
                                <td>'.$row->soldp.'</td>
                                <td>'.$row->shipp.'</td>
                                <td>'.$row->bildoc.'</td>
                                <td>'.$row->created_at.'</td>
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
                            ->whereIn('plantkey', $cnd1)
                            ->where('stuser2', 1)
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
                                <td><a class="button-32" href="/Show/'.encrypt($row->bildoc).'">Show</a></td>
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
        return view('Show')->with('data',$data)->with('brand',$brand)->with('port',$port)->with('datauser',$datauser)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
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
        return view('ShowForA1')->with('data',$data)->with('brand',$brand)->with('port',$port)->with('datauser',$datauser)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
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
        return view('ShowForB')->with('data',$data)->with('title',$title)->with('status',$status)->with('status1',$status1)->with('userinfo',$userinfo)->with('userinfo2',$userinfo2);
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
            function SemiExport(Request $request)
            {
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
                $liveValue = Data::whereNull('check')->where('status', 1)->count(); // Replace YourModel and $id with your actual model and ID
                $up= Data::whereNull('check')->where('status', 1)->latest('dateset')->value('dateset');
                return response()->json(['value' => $liveValue, 'up' => $up]);
            }
            public function notcheck()
            {
                $data = Data::whereNull('check')->where('status', 1)->get();
                return view('notcheck')->with('data',$data);
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
                            'edit-name' => 'required|string|max:255'
                        ]);

                        // Find the user by ID
                        $user = User::findOrFail($id);

                        // Update the user with the form data
                        $user->update([
                            'name' => $request->input('edit-name'),
                            'email' => $request->input('edit-email'),
                            'cond' => $request->input('edit-cond'),
                            'role' => $request->input('edit-role'),
                        ]);

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
}
