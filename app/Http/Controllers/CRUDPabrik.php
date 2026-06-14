<?php

namespace App\Http\Controllers;
use App\Models\sampah;
use App\Models\TransaksiBank;
use App\Models\TransaksiPabrik;
use Illuminate\Http\Request;

class CRUDPabrik extends Controller
{
    public function tambah()//
    {
    return view('PembayaranPabrik');
    }
    
    public function ptambah(Request $request)//
    {
        TransaksiPabrik::create([
            'IDPabrik' => $request->IDPabrik,
            'IDBankSampah' => $request->IDBankSampah,
            'Tanggal' => $request->Tanggal,
            'Uang' => $request->Uang
        ]);
        return redirect()->route('main');
        }

    public function lihat()//
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
        
    $warnings = TransaksiPabrik::rightJoin('TransaksiBank', function($join) {
            $join->on('TransaksiPabrik.Tanggal', '=', 'TransaksiBank.Tanggal')
                 ->on("TransaksiBank.IDBankSampah","=", 'TransaksiPabrik.IDBankSampah');
        })
        ->whereNull('TransaksiPabrik.IDUang')  // No matching bank record
        ->select(
            'TransaksiBank.Tanggal',
            'TransaksiBank.IDBankSampah'
        )
        ->distinct()
        ->get();

    return view('DashboardPabrik', compact('data', 'warnings'));
}

    public function edit($Tanggal, $IDBankSampah)//
    {
            $data = TransaksiPabrik::where('Tanggal', $Tanggal)
                                    ->where("IDBankSampah", $IDBankSampah)
                                    ->get();
            return view('edituang', compact('data', 'Tanggal'));
    }

    
    public function update(Request $request)//
{
    $ids = $request->input('id');
    $idPabriks = $request->input('IDPabrik');
    $idBankSampahs = $request->input('IDBankSampah');
    $uangs = $request->input('Uang');
    
    foreach ($ids as $index => $id) {
        TransaksiPabrik::where('IDUang', $id)->update([
            'IDPabrik' => $idPabriks[$index],
            'IDBankSampah' => $idBankSampahs[$index],
            'Uang' => $uangs[$index],
        ]);
    }
    
    return redirect()->route('main')->with('success', 'Data updated successfully');
}

    public function delete($Tanggal, $IDBankSampah){
        $data = TransaksiPabrik::where('Tanggal', $Tanggal)->where("IDBankSampah", $IDBankSampah)->delete();
        return redirect()->route('main')->with('success', 'Transaction deleted successfully!');
}
}