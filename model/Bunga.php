<?php

class Bunga {
    private $conn;
    private $table_name = "bunga";

    public $id_bunga;
    public $nama_bunga;
    public $jenis_bunga;
    public $warna;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET
                      nama_bunga = :nama_bunga,
                      jenis_bunga = :jenis_bunga,
                      warna = :warna";

        $stmt = $this->conn->prepare($query);

        $this->nama_bunga = htmlspecialchars(strip_tags($this->nama_bunga));
        $this->jenis_bunga = htmlspecialchars(strip_tags($this->jenis_bunga));
        $this->warna = htmlspecialchars(strip_tags($this->warna));

        $stmt->bindParam(":nama_bunga", $this->nama_bunga);
        $stmt->bindParam(":jenis_bunga", $this->jenis_bunga);
        $stmt->bindParam(":warna", $this->warna);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll() {
        $query = "SELECT
                    id_bunga, nama_bunga, jenis_bunga, warna
                  FROM
                    " . $this->table_name . "
                  ORDER BY
                    id_bunga ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function readOne() {
        $query = "SELECT
                    id_bunga, nama_bunga, jenis_bunga, warna
                  FROM
                    " . $this->table_name . "
                  WHERE
                    id_bunga = ?
                  LIMIT
                    0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id_bunga);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nama_bunga = $row['nama_bunga'];
            $this->jenis_bunga = $row['jenis_bunga'];
            $this->warna = $row['warna'];
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET
                      nama_bunga = :nama_bunga,
                      jenis_bunga = :jenis_bunga,
                      warna = :warna
                  WHERE
                      id_bunga = :id_bunga";

        $stmt = $this->conn->prepare($query);

        $this->nama_bunga = htmlspecialchars(strip_tags($this->nama_bunga));
        $this->jenis_bunga = htmlspecialchars(strip_tags($this->jenis_bunga));
        $this->warna = htmlspecialchars(strip_tags($this->warna));
        $this->id_bunga = htmlspecialchars(strip_tags($this->id_bunga));

        $stmt->bindParam(":nama_bunga", $this->nama_bunga);
        $stmt->bindParam(":jenis_bunga", $this->jenis_bunga);
        $stmt->bindParam(":warna", $this->warna);
        $stmt->bindParam(":id_bunga", $this->id_bunga);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_bunga = ?";

        $stmt = $this->conn->prepare($query);

        $this->id_bunga = htmlspecialchars(strip_tags($this->id_bunga));

        $stmt->bindParam(1, $this->id_bunga);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>