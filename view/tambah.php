<?php  ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bunga Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .form-actions { text-align: right; margin-top: 20px; }
        .btn-submit { background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .btn-submit:hover { background-color: #218838; }
        .btn-back { background-color: #6c757d; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none; margin-right: 10px; }
        .btn-back:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Bunga Baru</h2>

        <form action="index.php?action=tambah" method="post">
            <div class="form-group">
                <label for="nama_bunga">Nama Bunga:</label>
                <input type="text" id="nama_bunga" name="nama_bunga" required>
            </div>
            <div class="form-group">
                <label for="jenis_bunga">Jenis Bunga:</label>
                <input type="text" id="jenis_bunga" name="jenis_bunga" required>
            </div>
            <div class="form-group">
                <label for="warna">Warna:</label>
                <input type="text" id="warna" name="warna" required>
            </div>
            <div class="form-actions">
                <a href="index.php?action=list" class="btn-back">Kembali</a>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>