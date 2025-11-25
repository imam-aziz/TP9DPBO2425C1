<?php

require_once __DIR__ . '/../models/DB.php';

interface KontrakPresenter
{
    // method untuk tampilkan pembalap
    public function tampilkanPembalap(): string;

    // method untuk tampilkan form pembalap
    public function tampilkanFormPembalap($id = null): string;


    // method untuk CRUD pembalap
    public function tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void;
    public function ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void;
    public function hapusPembalap($id): void;
}
