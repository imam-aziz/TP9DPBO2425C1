<?php

class Arsitektur {
    private $id;
    private $nama;
    private $tipe; // contoh: Aerodinamika, Fuel System, Suspension
    private $deskripsi;
    private $kepatuhanFIA; // 0 atau 1

    public function __construct($id, $nama, $tipe, $deskripsi, $kepatuhanFIA){
        $this->id = $id;
        $this->nama = $nama;
        $this->tipe = $tipe;
        $this->deskripsi = $deskripsi;
        $this->kepatuhanFIA = (int)$kepatuhanFIA;
    }

    public function getId(){ return $this->id; }
    public function getNama(){ return $this->nama; }
    public function getTipe(){ return $this->tipe; }
    public function getDeskripsi(){ return $this->deskripsi; }
    public function getKepatuhanFIA(){ return $this->kepatuhanFIA; }

    public function setNama($v){ $this->nama = $v; }
    public function setTipe($v){ $this->tipe = $v; }
    public function setDeskripsi($v){ $this->deskripsi = $v; }
    public function setKepatuhanFIA($v){ $this->kepatuhanFIA = (int)$v; }
}
?>
