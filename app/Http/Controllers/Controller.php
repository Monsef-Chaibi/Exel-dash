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
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function import(){
        Excel::Import(new DataImport, request()->file('file'));
        return redirect()->back()->with('success', 'Data inserted successfully.');
    }
    function adduser(){
        return view('adduser');
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
                    // Other fields...
                ]);
                return redirect()->back()->with('success', 'Data inserted successfully.');
            }
            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Name already exists Or Password not match');
            }
        }
}
