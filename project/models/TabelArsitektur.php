<?php

include_once (__DIR__ . "/DB.php");
include_once (__DIR__ . "/../presenters/KontrakPresenter.php"); // (tidak dipakai utk model, tetapi untuk konsistensi)
include_once (__DIR__ . "/Arsitektur.php");

class TabelArsitektur extends DB {

    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllArsitektur(): array {
        $query = "SELECT * FROM arsitektur_mobil ORDER BY id ASC";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    public function getArsitekturById($id): ?array {
        $this->executeQuery("SELECT * FROM arsitektur_mobil WHERE id = :id", ['id' => $id]);
        $rows = $this->getAllResult();
        return $rows[0] ?? null;
    }

    public function addArsitektur($nama, $tipe, $deskripsi, $kepatuhanFIA): void {
        $query = "INSERT INTO arsitektur_mobil (nama, tipe, deskripsi, kepatuhanFIA) VALUES (:nama, :tipe, :deskripsi, :kepatuhanFIA)";
        $params = [
            ':nama' => $nama,
            ':tipe' => $tipe,
            ':deskripsi' => $deskripsi,
            ':kepatuhanFIA' => (int)$kepatuhanFIA
        ];
        $this->executeQuery($query, $params);
    }

    public function updateArsitektur($id, $nama, $tipe, $deskripsi, $kepatuhanFIA): void {
        $query = "UPDATE arsitektur_mobil SET nama = :nama, tipe = :tipe, deskripsi = :deskripsi, kepatuhanFIA = :kepatuhanFIA WHERE id = :id";
        $params = [
            ':id' => $id,
            ':nama' => $nama,
            ':tipe' => $tipe,
            ':deskripsi' => $deskripsi,
            ':kepatuhanFIA' => (int)$kepatuhanFIA
        ];
        $this->executeQuery($query, $params);
    }

    public function deleteArsitektur($id): void {
        $query = "DELETE FROM arsitektur_mobil WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }
}

?>
