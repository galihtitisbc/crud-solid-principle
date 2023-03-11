<?php

namespace App\Http\Controllers;

use App\Imports\PolicyImport;
use App\Models\PolicyData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PolicyController extends Controller
{
    public function index()
    {
        return view('index', [
            'data'  => PolicyData::all()
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
}
