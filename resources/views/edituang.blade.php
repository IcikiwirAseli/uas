<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi - IRIS</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda iris-flex-center">

<form action="{{ route('update.transaksipabrik') }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="hidden" name="Tanggal" value="{{ $Tanggal }}">
    
    <table border="1">
        <thead>
            <tr><th>IDPabrik</th><th>IDBankSampah</th><th>Uang</th></tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <input type="hidden" name="id[]" value="{{ $item->IDUang }}">
                <td><input type="text" name="IDPabrik[]" value="{{ $item->IDPabrik }}"></td>
                <td><input type="text" name="IDBankSampah[]" value="{{ $item->IDBankSampah }}"></td>
                <td><input type="number" name="Uang[]" value="{{ $item->uang }}"></td>
                <!-- removed extra hidden input -->
            </tr>
            @endforeach
        </tbody>
    </table>    
    <button type="submit">Update All</button>
</form>
</body>
</html>