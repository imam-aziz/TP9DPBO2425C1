<?php

include_once(__DIR__ . "/../models/TabelArsitektur.php");
include_once(__DIR__ . "/../models/Arsitektur.php");
include_once(__DIR__ . "/../views/ViewArsitektur.php");

class PresenterArsitektur {
    private $tabelArsitektur;
    private $viewArsitektur;
    private $list = [];

    public function __construct($tabelArsitektur, $viewArsitektur){
        $this->tabelArsitektur = $tabelArsitektur;
        $this->viewArsitektur = $viewArsitektur;
        $this->init();
    }

    private function init(){
        $data = $this->tabelArsitektur->getAllArsitektur();
        $this->list = [];
        foreach($data as $row){
            $a = new Arsitektur($row['id'], $row['nama'], $row['tipe'], $row['deskripsi'], $row['kepatuhanFIA']);
            $this->list[] = $a;
        }
    }

    public function tampilkanArsitektur(): string {
        $this->init();
        return $this->viewArsitektur->tampilArsitektur($this->list);
    }

    public function tampilkanFormArsitektur($id = null): string {
        $data = null;
        if($id !== null){
            $data = $this->tabelArsitektur->getArsitekturById($id);
        }
        return $this->viewArsitektur->tampilFormArsitektur($data);
    }

    public function tambahArsitektur($nama, $tipe, $deskripsi, $kepatuhanFIA): void {
        $this->tabelArsitektur->addArsitektur($nama, $tipe, $deskripsi, $kepatuhanFIA);
        $this->init();
    }

    public function ubahArsitektur($id, $nama, $tipe, $deskripsi, $kepatuhanFIA): void {
        $this->tabelArsitektur->updateArsitektur($id, $nama, $tipe, $deskripsi, $kepatuhanFIA);
        $this->init();
    }

    public function hapusArsitektur($id): void {
        $this->tabelArsitektur->deleteArsitektur($id);
        $this->init();
    }
}

?>
