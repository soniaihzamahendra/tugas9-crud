<?php // TUGAS59CRUD/view/list_bunga.php (VIEW) ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bunga Mekar Indah</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px 20px; /* Tambah padding agar tidak terlalu mepet */
            background: linear-gradient(to right, #e2eefd, #f0e6f6); /* Gradasi background soft */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 900px; /* Lebarkan sedikit */
            width: 100%;
            background: rgba(255, 255, 255, 0.95); /* Sedikit transparan untuk efek soft */
            padding: 35px; /* Tambah padding */
            border-radius: 15px; /* Lebih bulat */
            box-shadow: 0 10px 30px rgba(0,0,0,0.08); /* Bayangan lebih halus */
            backdrop-filter: blur(5px); /* Efek blur pada background di belakang container */
        }
        h2 {
            text-align: center;
            color: #5d4037; /* Coklat lembut */
            margin-bottom: 30px;
            font-weight: 600;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.05);
        }
        table {
            width: 100%;
            border-collapse: separate; /* Gunakan separate untuk border-radius di sel */
            border-spacing: 0;
            margin-top: 25px;
            overflow: hidden; /* Penting untuk border-radius pada tabel */
            border-radius: 10px;
        }
        th, td {
            padding: 14px 18px; /* Lebih banyak padding */
            text-align: left;
            border-bottom: 1px solid #e0e0e0; /* Border lebih soft */
        }
        th {
            background-color: #d1e2e9; /* Biru muda keabuan */
            color: #4a6a7c;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.95em;
        }
        tr:nth-child(even) {
            background-color: #f8f8f8; /* Selang-seling baris */
        }
        tr:hover {
            background-color: #eef7fb; /* Hover efek */
            transition: background-color 0.3s ease;
        }
        td {
            color: #555;
            vertical-align: middle;
        }
        /* Border untuk bagian atas dan bawah tabel */
        th:first-child { border-top-left-radius: 10px; }
        th:last-child { border-top-right-radius: 10px; }
        tr:last-child td:first-child { border-bottom-left-radius: 10px; }
        tr:last-child td:last-child { border-bottom-right-radius: 10px; }
        tr:last-child td { border-bottom: none; }


        .no-data {
            text-align: center;
            color: #777;
            margin-top: 30px;
            padding: 15px;
            background-color: #ffe0b2; /* Oranye lembut */
            border-radius: 8px;
            font-style: italic;
        }

        .add-button-container {
            margin-bottom: 25px;
            text-align: right;
        }
        .add-button {
            background-color: #81c784; /* Hijau mint */
            color: white;
            padding: 12px 22px;
            border: none;
            border-radius: 8px; /* Lebih bulat */
            cursor: pointer;
            text-decoration: none;
            font-size: 1.05em;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 10px rgba(0, 150, 136, 0.2); /* Bayangan hijau/biru */
        }
        .add-button:hover {
            background-color: #66bb6a;
            transform: translateY(-2px); /* Efek angkat saat hover */
        }

        .action-links a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px; /* Lebih bulat */
            color: white;
            margin-right: 8px; /* Jarak antar tombol */
            font-size: 0.9em;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block; /* Agar bisa pakai margin-top/bottom jika dibutuhkan */
        }
        .action-links a:last-child {
            margin-right: 0;
        }

        .edit-button {
            background-color: #64b5f6; /* Biru langit */
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.2);
        }
        .delete-button {
            background-color: #ef9a9a; /* Merah muda lembut */
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);
        }
        .edit-button:hover {
            background-color: #42a5f5;
            transform: translateY(-1px);
        }
        .delete-button:hover {
            background-color: #e57373;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Bunga</h2>

        <div class="add-button-container">
            <a href="index.php?action=tambah" class="add-button">Tambah Bunga Baru</a>
        </div>

        <?php
        if ($num > 0) {
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>ID Bunga</th>";
                        echo "<th>Nama Bunga</th>";
                        echo "<th>Jenis Bunga</th>";
                        echo "<th>Warna</th>";
                        echo "<th>Aksi</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    echo "<tr>";
                        echo "<td>{$id_bunga}</td>";
                        echo "<td>{$nama_bunga}</td>";
                        echo "<td>{$jenis_bunga}</td>";
                        echo "<td>{$warna}</td>";
                        echo "<td class='action-links'>";
                            echo "<a href='index.php?action=edit&id={$id_bunga}' class='edit-button'>Ubah</a>";
                            echo "<a href='index.php?action=hapus&id={$id_bunga}' class='delete-button'>Hapus</a>";
                        echo "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
            echo "</table>";
        } else {
            echo "<div class='no-data'>Tidak ada data bunga yang ditemukan.</div>";
        }
        ?>

    </div>
</body>
</html>