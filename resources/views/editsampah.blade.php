<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi Sampah - IRIS</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda iris-flex-center">

    <div class="iris-modal-card">
        <h2 class="iris-modal-title">Edit Transaksi Sampah</h2>

        <form action="{{ route('update.transaksibank', $transaction->IDTransaksiSampah) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="iris-form-group">
                <label for="NIK">NIK</label>
                <input type="text" name="NIK" class="iris-form-input" value="{{ $transaction->NIK }}" required>
            </div>
            
            <div class="iris-form-group">
                <label for="IDBankSampah">ID Bank Sampah</label>
                <input type="text" name="IDBankSampah" class="iris-form-input" value="{{ $transaction->IDBankSampah }}" required>
            </div>
            
            <div class="iris-form-group">
                <label for="IDSampah">Jenis Sampah</label>
                <select name="IDSampah" id="IDSampah" class="iris-form-input" required>
                    @foreach($sampahData as $X)
                        <option value="{{ $X->IDSampah }}" {{ $transaction->IDSampah == $X->IDSampah ? 'selected' : '' }}>
                            {{ $X->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="iris-form-group">
                <label for="QTY">Jumlah (QTY)</label>
                <input type="number" name="QTY" class="iris-form-input" value="{{ $transaction->QTY }}" required>
            </div>

            <div class="iris-form-group">
                <label for="Tanggal">Tanggal</label>
                <input type="date" name="Tanggal" class="iris-form-input" value="{{ $transaction->tanggal }}" required>
            </div>
            
            <div class="iris-btn-container">
                <button type="submit" class="iris-btn-simpan">Update</button>
                <a href="{{ route('main') }}" class="iris-btn-batal" style="text-decoration:none;">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>