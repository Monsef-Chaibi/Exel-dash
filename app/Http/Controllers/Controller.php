<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function import(){
        Excel::Import(new UsersImport, request()->file('file'));
        return redirect()->back();
    }
    function adduser(){
        return view('adduser');
    }
    function alluser(){
        return view('alluser');
    }
    function AddData(){
        return view('AddData');
    }
    function ViewData(){
        return view('ViewData');
    }
    function StoreUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'pass' => 'required|min:6',
            'pass_ver' => 'required|same:pass', // This checks if pass_ver is the same as pass
            'role' => 'required', // Add any other validation rules as needed
        ]);
          // If the validation passes, continue with storing the data

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('pass')),
            'role' => $request->input('role'),
            // Other fields...
        ]);

        return redirect()->back()->with('success','Donne');
    }
}
