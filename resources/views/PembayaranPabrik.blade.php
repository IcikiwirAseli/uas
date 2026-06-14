<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Uang - IRIS</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda iris-flex-center">

    <div class="iris-modal-card">
        <h2 class="iris-modal-title">Transfer ke Bank Sampah</h2>

        <form action="{{ route('post.tambahPabrik') }}" method="POST">
            @csrf   
            
            <div class="iris-form-group">
                <label for="IDPabrik">ID Pabrik</label>
                <input type="text" name="IDPabrik" id="IDPabrik" class="iris-form-input" placeholder="Masukkan ID Pabrik" required>
            </div>

            <div class="iris-form-group">
                <label for="IDBankSampah">ID Bank Sampah</label>
                <input type="text" name="IDBankSampah" id="IDBankSampah" class="iris-form-input" placeholder="Masukkan ID Bank Sampah" required>
            </div>

            <div class="iris-form-group">
                <label for="Tanggal">Tanggal</label>
                <input type="date" name="Tanggal" id="Tanggal" class="iris-form-input" required>
            </div>

            <div class="iris-form-group">
                <label for="Uang">Nominal (Rp)</label>
                <input type="number" name="Uang" id="Uang" class="iris-form-input" placeholder="Contoh: 50000" required>
            </div>

            <div class="iris-btn-container">
                <button type="submit" class="iris-btn-simpan">Kirim</button>
            </div>
        </form>
    </div>

</body>
</html>