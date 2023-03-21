<?php

namespace App\Http\Controllers;

use App\Exports\PolicyExport;
use App\Imports\PolicyImport;
use App\Models\PolicyData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PolicyController extends Controller
{
    public function index()
    {
        return view('index', [
            'data'  => PolicyData::paginate(5)
        ]);
    }
    public function tambah(Request $request)
    {
        try {
            Excel::import(new PolicyImport, $request->excel);
            return redirect('/home')->with('sukses', 'Sukses Import Excel');
        } catch (\Throwable $e) {
            return redirect('/home')->with('gagal', $e->getMessage());
        }
    }
    public function export()
    {
        try {
            return Excel::download(new PolicyExport, 'policy_data.xlsx');
        } catch (\Throwable $e) {
            return redirect('/home')->with('gagal', $e->getMessage());
        }
    }
}
