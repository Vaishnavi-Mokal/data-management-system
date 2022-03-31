<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function export() 
    {
          
        return Excel::download(new UsersExport, 'users.csv');
    }
   

    public function report(){
        return view('Sales Team.Report');
    }
}
