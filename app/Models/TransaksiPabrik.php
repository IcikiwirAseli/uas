<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPabrik extends Model
{
    protected $table='TransaksiPabrik';
    protected $primaryKey = 'IDUang';
    protected $fillable = [
        'IDPabrik',
        'IDBankSampah',
        'Tanggal',
        'Uang'
    ];

    public $timestamps = false;
}
