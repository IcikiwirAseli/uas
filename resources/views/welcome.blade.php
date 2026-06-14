<!DOCTYPE html>
<html>
<head>
    <title>Dashbard</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda">
<div style="display: flex; justify-content:space-between;" >
    <h1 class="logo-text">IRIS</h1>
    <div class="header-banner" style="width: 200px;">
        <a href="/register" class="btn-kirim-uang"> Register </a>
        <a href="/login" class="btn-kirim-uang"> Login </a>
    </div>
</div>
<div class="data-card">
        <h3>Data Transaksi</h3>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>ID Bank Sampah</th>
                        <th>Total Harga Sampah</th>
                        <th>Total Uang Terkirim</th>
                        <th>ID Pabrik</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $x)
                    <tr>
                        <td>{{ $x->Tanggal }}</td>
                        <td>{{ $x->IDBankSampah }}</td>
                        <td>{{ $x->Total }}</td>
                        <td>{{ $x->Uang }}</td>
                        <td>{{ $x->IDPabrik }}</td>
</tr>
@endforeach
</table>
</body>
</html>