<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new ExcelController, 'generate.xlsx');
    }
}
