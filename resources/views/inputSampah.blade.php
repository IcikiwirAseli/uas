<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Sampah - IRIS</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-hijau-muda iris-flex-center">

    <div class="iris-modal-card">
        <h2 class="iris-modal-title">Input Data Sampah</h2>

        <form action="{{ route('post.tambahBank') }}" method="POST">
            @csrf   

            <div class="iris-form-group">
                <label for="NIK">NIK</label>
                <input type="text" name="NIK" class="iris-form-input" placeholder="Masukkan NIK" required>
            </div>

            <div class="iris-form-group">
                <label for="IDBankSampah">ID Bank Sampah</label>
                <input type="text" name="IDBankSampah" class="iris-form-input" placeholder="Masukkan ID Bank Sampah" required>
            </div>

            <div class="iris-form-group">
                <label for="IDSampah">Jenis Sampah</label>
                <select name="IDSampah" id="IDSampah" class="iris-form-input" required>
                    @foreach($data as $X)
                        <option value="{{$X->IDSampah}}">{{ $X->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="iris-form-group">
                <label for="QTY">Jumlah (Qty)</label>
                <input type="number" name="QTY" class="iris-form-input" placeholder="Masukkan Jumlah" required>
            </div>

            <div class="iris-form-group">
                <label for="Tanggal">Tanggal</label>
                <input type="date" name="Tanggal" id="Tanggal" class="iris-form-input" required>
            </div>

            <div class="iris-btn-container">
                <button type="submit" class="iris-btn-simpan">Submit</button>
            </div>
        </form>
    </div>

</body>
</html>