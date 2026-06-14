<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi Sampah</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda">
<div class="app-container">
    
    <div class="top-header">
        <h1 class="logo-text">IRIS</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn-logout" type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="header-banner">
        <h2>Bank Sampah</h2>
        <a href="/inputsampah" class="btn-kirim-uang">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14" height="14" fill="white">
                <path d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3 .3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.8-6.1 23.9-5.5 34 1.4z"/>
            </svg>
            Input Sampah
        </a>
    </div>

<br>
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
            <th>Tindakan</th>
        </tr>
    </thead>
<tbody>
@foreach($data as $row)
<tr>
    <td>{{ $row->Tanggal }}</td>
    <td>{{ $row->IDBankSampah }}</td>
    <td>{{ number_format($row->Total, 0, ',', '.') }}</td>
    <td>{{ number_format($row->uang, 0, ',', '.') ?? '0' }}</td>
    <td>{{ $row->IDPabrik ?? '-' }}</td>
<td>
    <div class="action-buttons">
        <a href="{{  route('edit.transaksibank', [$row->Tanggal, $row->IDBankSampah])  }}" class="btn-edit">Edit</a>
        <form action="{{  route('delete.transaksibank', [$row->Tanggal, $row->IDBankSampah])  }}" method="POST" class="form-delete">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn-delete">Hapus</button>
        </form>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table>

<br>
<H1>Info</H1>
@if($warnings->count() > 0)
    <div style="background-color: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin-bottom: 20px;">
        <h3 style="color: #856404;">⚠️ Peringatan: Pembayaran Pabrik Tanpa Transaksi Bank</h3>
        <p>Berikut adalah tanggal dan Bank Sampah yang sudah dibayar oleh Pabrik, namun belum ada transaksi masuk dari Bank Sampah:</p>
        <ul>
            @foreach($warnings as $warning)
                <li>
                    Bank ID: <strong>{{ $warning->IDBankSampah }}</strong> | 
                    Tanggal: <strong>{{ $warning->Tanggal }}</strong> | 
                    Uang dikirim: Rp {{ number_format($warning->Uang, 0, ',', '.') }} | 
                    ID Pabrik: {{ $warning->IDPabrik }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>