<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelController extends Controller
{
    public function export() 
    {
        $users = User::all();

        $fileName = 'users.xlsx';
        
        Excel::download($users, $fileName, null, function($excel) use ($users) {
            $excel->sheet('Sheet1', function($sheet) use ($users) {
                $sheet->fromModel($users);
            });
        });
    }  
}
