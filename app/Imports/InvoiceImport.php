<?php

namespace App\Imports;

use App\Models\apbinvoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class InvoiceImport implements ToModel, WithHeadingRow,WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function uniqueBy()
    {
        return 'id';
    }
    public function model(array $row)
    {
        return new apbinvoice([
            //
            'id' =>$row['id'],
            'trdate' =>$row['trdate'],
            'custid' =>$row['custid'],
            'custname' =>$row['custname'],
            'unitid' =>$row['unitid'],
            'unitiddesc' =>$row['unitiddesc'],
            'note' =>$row['note'],
            'curr' =>$row['curr'],
            'grossamt' =>$row['grossamt'],
            'discamt' =>$row['discamt'],
            'taxable' =>$row['taxable'],
            'taxamt' =>$row['taxamt'],
            'netamt' =>$row['netamt'],
            'svc_price' =>$row['svc_price'],
            'svc_amt' =>$row['svc_amt'],
            'sink_price' =>$row['sink_price'],
            'sink_amt' =>$row['sink_amt'],
            'ret_price' =>$row['ret_price'],
            'ret_amt' =>$row['ret_amt'],
            'oth_price' =>$row['oth_price'],
            'oth_amt' =>$row['oth_amt'],
            'water_begin' =>$row['water_begin'],
            'water_end' =>$row['water_end'],
            'water_usage' =>$row['water_usage'],
            'water_adm' =>$row['water_adm'],
            'water_adm_rate' =>$row['water_adm_rate'],
            'water_sub_price' =>$row['water_sub_price'],
            'water_sub' =>$row['water_sub'],
            'water_maint' =>$row['water_maint'],
            'water_maint_rate' =>$row['water_maint_rate'],
            'water_price' =>$row['water_price'],
            'water_amt' =>$row['water_amt'],
            'water_adv_price' =>$row['water_adv_price'],
            'water_adv_amt' =>$row['water_adv_amt'],
            'elec_begin' =>$row['elec_begin'],
            'elec_end' =>$row['elec_end'],
            'elec_usage' =>$row['elec_usage'],
            'elec_pju' =>$row['elec_pju'],
            'elec_maint' =>$row['elec_maint'],
            'elec_pju_rate' =>$row['elec_pju_rate'],
            'elec_maint_rate' =>$row['elec_maint_rate'],
            'elec_price' =>$row['elec_price'],
            'elec_amt' =>$row['elec_amt'],
            'elec_kva' =>$row['elec_kva'],
            'gas_begin' =>$row['gas_begin'],
            'gas_end' =>$row['gas_end'],
            'gas_usage' =>$row['gas_usage'],
            'gas_maint' =>$row['gas_maint'],
            'gas_maint_rate' =>$row['gas_maint_rate'],
            'space_unit' =>$row['space_unit'],
            'ppn' =>$row['ppn'],
            'startelecewaterperiod' =>$row['startelecewaterperiod'],
            'endtelecewaterperiod' =>$row['endtelecewaterperiod'],
            'startserviceperiod' =>$row['startserviceperiod'],
            'endserviceperiod' =>$row['endserviceperiod'],
            'paymentsch' =>$row['paymentsch'],
            'minusage' =>$row['minusage'],
            'ctelec' =>$row['ctelec'],
        ]);
    }
}
