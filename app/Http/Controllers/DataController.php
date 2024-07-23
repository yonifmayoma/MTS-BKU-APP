<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Data::all();
            return datatables()->of($data)->make(true);
        }

        return view('scenes.dashboard.dataTable');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new DataImport, $request->file('file'));

        return redirect()->route('data.index')->with('success', 'File uploaded and data imported successfully.');
    }
}
