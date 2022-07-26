<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apbinvoice extends Model
{
    use HasFactory;
    protected $table = 'APB_invoice';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id',	'trdate',	'custid',	'custname',	'unitid',	'unitiddesc',	'note',	'curr',	'grossamt',	'discamt',	'taxable',	'taxamt',	'netamt',	'svc_price',	'svc_amt',	'sink_price',	'sink_amt',	'ret_price',	'ret_amt',	'oth_price',	'oth_amt',	'water_begin',	'water_end',	'water_usage',	'water_adm',	'water_adm_rate',	'water_sub_price',	'water_sub',	'water_maint',	'water_maint_rate',	'water_price',	'water_amt',	'water_adv_price',	'water_adv_amt',	'elec_begin',	'elec_end',	'elec_usage',	'elec_pju',	'elec_maint',	'elec_pju_rate',	'elec_maint_rate',	'elec_price',	'elec_amt',	'elec_kva',	'gas_begin',	'gas_end',	'gas_usage',	'gas_maint',	'gas_maint_rate',	'space_unit',	'ppn',	'startelecewaterperiod',	'endtelecewaterperiod',	'startserviceperiod',	'endserviceperiod',	'paymentsch',	'minusage',	'ctelec'];
}
