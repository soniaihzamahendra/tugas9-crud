<?php  ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus Bunga</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f4f4f4; margin: 0; }
        .confirmation-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; max-width: 400px; width: 90%; }
        .confirmation-box h2 { color: #dc3545; margin-bottom: 15px; }
        .confirmation-box p { margin-bottom: 20px; line-height: 1.5; }
        .confirmation-box .actions button { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin: 0 10px; }
        .confirmation-box .actions .btn-confirm { background-color: #dc3545; color: white; }
        .confirmation-box .actions .btn-confirm:hover { background-color: #c82333; }
        .confirmation-box .actions .btn-cancel { background-color: #6c757d; color: white; }
        .confirmation-box .actions .btn-cancel:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Konfirmasi</h2>
        <p>Anda yakin ingin menghapus bunga "<?php echo htmlspecialchars($bunga->nama_bunga . " - " . $bunga->warna); ?>" dengan ID <?php echo htmlspecialchars($id); ?>?</p>
        <div class="actions">
            <form id="deleteForm" action="index.php?action=hapus&id=<?php echo htmlspecialchars($id); ?>" method="post" style="display: inline;">
                <input type="hidden" name="confirm_delete" value="yes">
                <button type="submit" class="btn-confirm">Ya, Hapus</button>
            </form>
            <button type="button" class="btn-cancel" onclick="window.location.href='index.php?action=list';">Batal</button>
        </div>
    </div>
</body>
</html>