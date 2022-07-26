<?php

namespace App\Imports;

use App\Models\apbpayment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PaymentImport implements ToModel, WithHeadingRow,WithUpserts
{

    public function uniqueBy()
    {
        return 'id';
    }/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new apbpayment([
            //
            'id' =>$row['id'],
            'idca' =>$row['idca'],
            'cadate' =>$row['cadate'],
            'camanualref' =>$row['camanualref'],
            'cahdrremarks' =>$row['cahdrremarks'],
            'caremarks' =>$row['caremarks'],
            'amount' =>$row['amount'],
        ]);
    }
}
