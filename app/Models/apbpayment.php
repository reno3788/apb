<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apbpayment extends Model
{
    use HasFactory;
    protected $table = 'APB_payment';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id',	'idca',	'cadate',	'camanualref',	'cahdrremarks',	'caremarks',	'amount',	];
}
