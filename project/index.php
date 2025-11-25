<?php
// index.php — entrypoint
include_once("models/DB.php");
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

include_once("models/TabelArsitektur.php");
include_once("views/ViewArsitektur.php");
include_once("presenters/PresenterArsitektur.php");

// inisialisasi model & presenter
$dbHost = 'localhost';
$dbName = 'mvp_db';
$dbUser = 'root';
$dbPass = ''; // sesuaikan jika perlu

$tabelPembalap = new TabelPembalap($dbHost, $dbName, $dbUser, $dbPass);
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

$tabelArsitektur = new TabelArsitektur($dbHost, $dbName, $dbUser, $dbPass);
$viewArsitektur = new ViewArsitektur();
$presenterArsitektur = new PresenterArsitektur($tabelArsitektur, $viewArsitektur);

// Tentukan entity default
$entity = isset($_REQUEST['entity']) ? $_REQUEST['entity'] : 'pembalap';

// HANDLE GET screens
if(isset($_GET['screen'])){
    $screen = $_GET['screen'];
    if($entity === 'pembalap'){
        if($screen == 'add'){
            echo $presenterPembalap->tampilkanFormPembalap(null);
            exit();
        } elseif($screen == 'edit' && isset($_GET['id'])){
            echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
            exit();
        }
    } elseif($entity === 'arsitektur'){
        if($screen == 'add'){
            echo $presenterArsitektur->tampilkanFormArsitektur(null);
            exit();
        } elseif($screen == 'edit' && isset($_GET['id'])){
            echo $presenterArsitektur->tampilkanFormArsitektur($_GET['id']);
            exit();
        }
    }
}

// HANDLE POST actions (add / edit / delete)
if(isset($_POST['action'])){
    $action = $_POST['action'];
    $entityPost = isset($_POST['entity']) ? $_POST['entity'] : $entity;

    if($entityPost === 'pembalap'){
        if($action === 'add'){
            $nama = $_POST['nama'] ?? '';
            $tim = $_POST['tim'] ?? '';
            $negara = $_POST['negara'] ?? '';
            $poinMusim = $_POST['poinMusim'] ?? 0;
            $jumlahMenang = $_POST['jumlahMenang'] ?? 0;
            $presenterPembalap->tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
        } elseif($action === 'edit'){
            $id = $_POST['id'] ?? null;
            $nama = $_POST['nama'] ?? '';
            $tim = $_POST['tim'] ?? '';
            $negara = $_POST['negara'] ?? '';
            $poinMusim = $_POST['poinMusim'] ?? 0;
            $jumlahMenang = $_POST['jumlahMenang'] ?? 0;
            if($id !== null) $presenterPembalap->ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
        } elseif($action === 'delete'){
            $id = $_POST['id'] ?? null;
            if($id !== null) $presenterPembalap->hapusPembalap($id);
        }

        header("Location: index.php?entity=pembalap");
        exit();
    } elseif($entityPost === 'arsitektur'){
        if($action === 'add'){
            $nama = $_POST['nama'] ?? '';
            $tipe = $_POST['tipe'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $kepatuhan = isset($_POST['kepatuhanFIA']) ? 1 : 0;
            $presenterArsitektur->tambahArsitektur($nama, $tipe, $deskripsi, $kepatuhan);
        } elseif($action === 'edit'){
            $id = $_POST['id'] ?? null;
            $nama = $_POST['nama'] ?? '';
            $tipe = $_POST['tipe'] ?? '';
            $deskripsi = $_POST['deskripsi'] ?? '';
            $kepatuhan = isset($_POST['kepatuhanFIA']) ? 1 : 0;
            if($id !== null) $presenterArsitektur->ubahArsitektur($id, $nama, $tipe, $deskripsi, $kepatuhan);
        } elseif($action === 'delete'){
            $id = $_POST['id'] ?? null;
            if($id !== null) $presenterArsitektur->hapusArsitektur($id);
        }

        header("Location: index.php?entity=arsitektur");
        exit();
    } else {
        // fallback redirect to pembalap
        header("Location: index.php");
        exit();
    }
}

// Default rendering (list)
if($entity === 'pembalap'){
    echo $presenterPembalap->tampilkanPembalap();
} elseif($entity === 'arsitektur'){
    echo $presenterArsitektur->tampilkanArsitektur();
} else {
    echo $presenterPembalap->tampilkanPembalap();
}
