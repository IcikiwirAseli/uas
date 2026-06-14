<?php

namespace App\Http\Controllers;
use App\Models\TransaksiPabrik;
use Illuminate\Http\Request;

class guest extends Controller
{
    public function lihat(){
    $data = TransaksiPabrik::rightJoin("TransaksiBank", function($join) {
            $join->on("TransaksiBank.IDBankSampah", "=", "TransaksiPabrik.IDBankSampah")
                 ->on("TransaksiBank.Tanggal", "=", "TransaksiPabrik.Tanggal");
        })
        ->join("Sampah", "TransaksiBank.IDSampah", "=", "sampah.IDSampah")      
        ->selectraw('
            TransaksiBank.IDTransaksiSampah,
            TransaksiBank.IDBankSampah,
            TransaksiBank.Tanggal,
            TransaksiBank.NIK,
            TransaksiBank.QTY,
            sampah.nama,
            (sampah.harga * TransaksiBank.QTY) as Total,
            TransaksiPabrik.Uang,
            TransaksiPabrik.IDUang,
            TransaksiPabrik.IDPabrik
        ')
        ->orderBy("TransaksiBank.Tanggal", "desc")
        ->get();
    return view('welcome', compact('data'));}

}
