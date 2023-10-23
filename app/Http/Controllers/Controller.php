<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Data;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function import(){
        Excel::Import(new DataImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data inserted successfully.');
    }
    function Status($id){
       dd($id);
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
        $data=Data::paginate(5);
        return view('ViewData')->with('data', $data);
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
    function Show($id){
        $title = Data::where('bildoc',$id)->first();
        $data = Data::where('bildoc',$id)->get();
        return view('Show')->with('data',$data)->with('title',$title);
        }

}
