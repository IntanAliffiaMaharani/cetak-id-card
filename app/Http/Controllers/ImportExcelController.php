<?php

namespace App\Http\Controllers;

use App\Imports\IdCardImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new IdCardImport, $request->file('file'));

        return redirect('/')
            ->with('success','Data berhasil diimport.');
    }
}