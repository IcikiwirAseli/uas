<?php

namespace App\Http\Controllers;
use App\Models\TransaksiPabrik;
use App\Models\TransaksiBank;
use App\Models\sampah;
use Illuminate\Http\Request;

class test extends Controller
{
public function lihat()
{
    $bankSub = TransaksiBank::join('Sampah', 'TransaksiBank.IDSampah', '=', 'sampah.IDSampah')
        ->select(
            'TransaksiBank.IDBankSampah',
            'TransaksiBank.Tanggal',
            TransaksiBank::raw('SUM(sampah.harga * TransaksiBank.QTY) as TotalBank')
        )
        ->groupBy('TransaksiBank.IDBankSampah', 'TransaksiBank.Tanggal');

    $pabrikSub = TransaksiPabrik::select(
            'IDBankSampah',
            'Tanggal',
            TransaksiBank::raw('SUM(Uang) as TotalUang'),
            TransaksiBank::raw('GROUP_CONCAT(DISTINCT IDPabrik ORDER BY IDPabrik SEPARATOR ", ") as IDPabrik_list')
        )
        ->groupBy('IDBankSampah', 'Tanggal');

    // Join the two aggregated subqueries
    $data = TransaksiBank::query()
        ->fromSub($bankSub, 'bank')
        ->JoinSub($pabrikSub, 'pabrik', function ($join) {
            $join->on('bank.IDBankSampah', '=', 'pabrik.IDBankSampah')
                 ->on('bank.Tanggal', '=', 'pabrik.Tanggal');
        })
        ->select(
            'bank.IDBankSampah',
            'bank.Tanggal',
            'bank.TotalBank as Total',
            'pabrik.TotalUang as uang',
            'pabrik.IDPabrik_list as IDPabrik'
        )
        ->orderBy('bank.Tanggal', 'desc')
        ->get();
        
    $warnings = TransaksiPabrik::leftJoin('TransaksiBank', function($join) {
            $join->on('TransaksiPabrik.IDBankSampah', '=', 'TransaksiBank.IDBankSampah')
                 ->on('TransaksiPabrik.Tanggal', '=', 'TransaksiBank.Tanggal');
        })
        ->whereNull('TransaksiBank.Tanggal')  // No matching bank record
        ->select(
            'TransaksiPabrik.IDBankSampah',
            'TransaksiPabrik.Tanggal',
            'TransaksiPabrik.Uang',
            'TransaksiPabrik.IDPabrik'
        )
        ->distinct()
        ->orderby("Tanggal")
        ->get();
    
     return view('mambo', compact('data', 'warnings'));
}

}