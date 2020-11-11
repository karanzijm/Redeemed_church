<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BulkImport;
use App\Exports\BulkExport;
use Maatwebsite\Excel\Facades\Excel;

class ChurchUser extends Controller
{
    public function importExportView()
    {
        return view('importUsers');
    }

    public function import()
    {
        Excel::import(new BulkImport, request()->file('file'));
        return back();
    }
}
