<?php

namespace App\Imports;

use App\Models\PolicyData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PolicyImport implements ToModel, WithBatchInserts, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new PolicyData([
            'policy'    => $row[0],
            'expiry'    => $row[1],
            'location'    => $row[2],
            'state'    => $row[3],
            'region'    => $row[4],
            'insured'    => $row[5],
            'construction'    => $row[6],
            'business'    => $row[7],
            'earth'    => $row[8],
            'flood'    => $row[9],
        ]);
    }
    public function chunkSize(): int
    {
        return 1000;
    }
    public function batchSize(): int
    {
        return 1000;
    }
}
