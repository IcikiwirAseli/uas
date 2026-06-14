<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiBank extends Model
{
    protected $table='TransaksiBank';
    protected $primaryKey = 'IDTransaksiSampah';
    protected $fillable = [
        'IDtransaksiSampah',
        'NIK',
        'IDBankSampah',
        'IDSampah',
        'QTY',
        'Tanggal'
    ];

    public $timestamps = false;
}
