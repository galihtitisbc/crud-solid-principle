<?php

namespace App\Exports;

use App\Models\PolicyData;
use Maatwebsite\Excel\Concerns\FromCollection;

class PolicyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PolicyData::all();
    }
}
