<?php

require_once __DIR__ . '/model/Database.php';
require_once __DIR__ . '/model/Bunga.php';


$database = new Database();
$db = $database->getConnection();


$bunga = new Bunga($db);


$action = $_GET['action'] ?? 'list'; 
$id = $_GET['id'] ?? null; 


switch ($action) {
    case 'list':
        $stmt = $bunga->readAll();
        $num = $stmt->rowCount();
        include __DIR__ . '/view/list_bunga.php'; 
        break;

    case 'tambah':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bunga->nama_bunga = $_POST['nama_bunga'] ?? '';
            $bunga->jenis_bunga = $_POST['jenis_bunga'] ?? '';
            $bunga->warna = $_POST['warna'] ?? '';

            if ($bunga->create()) {
                echo "<script>alert('Bunga berhasil ditambahkan!'); window.location.href='index.php?action=list';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan bunga. coba lagi.'); window.location.href='index.php?action=tambah';</script>";
            }
            exit();
        } else {
            include __DIR__ . '/view/tambah.php'; 
        }
        break;

    case 'edit':
        if (empty($id)) {
            die('ERROR: ID Bunga tidak ditemukan untuk diedit.');
        }

        $bunga->id_bunga = $id;
        $bunga->readOne(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bunga->nama_bunga = $_POST['nama_bunga'] ?? '';
            $bunga->jenis_bunga = $_POST['jenis_bunga'] ?? '';
            $bunga->warna = $_POST['warna'] ?? '';

            if ($bunga->update()) {
                echo "<script>alert('Bunga berhasil diubah!'); window.location.href='index.php?action=list';</script>";
            } else {
                echo "<script>alert('Gagal mengubah bunga. coba lagi.'); window.location.href='index.php?action=edit&id={$id}';</script>";
            }
            exit();
        } else {
            include __DIR__ . '/view/edit.php'; 
        }
        break;

    case 'hapus':
        if (empty($id)) {
            die('ERROR: ID Bunga tidak ditemukan untuk dihapus.');
        }

        $bunga->id_bunga = $id;
        $bunga->readOne(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
            if ($bunga->delete()) {
                echo "<script>alert('Bunga berhasil dihapus!'); window.location.href='index.php?action=list';</script>";
            } else {
                echo "<script>alert('Gagal menghapus bunga. coba lagi.'); window.location.href='index.php?action=list';</script>";
            }
            exit();
        } else {
            include __DIR__ . '/view/konfirmasi_hapus.php'; // VIEW
        }
        break;

    default:
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1><p>Aksi tidak valid atau halaman tidak ditemukan.</p>";
        break;
}
?>