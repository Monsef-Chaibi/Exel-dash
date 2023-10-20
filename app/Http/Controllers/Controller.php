<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;

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
}
