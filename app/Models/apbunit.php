<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apbunit extends Model
{
    use HasFactory;
    protected $table = 'APB_unit';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
