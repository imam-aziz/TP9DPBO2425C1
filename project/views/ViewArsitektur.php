<?php

include_once ("KontrakView.php"); // optional, but keep consistent

class ViewArsitektur {

    public function __construct(){
    }

    public function tampilArsitektur($listArsitektur): string {
        // Build rows
        $tbody = '';
        $no = 1;
        foreach($listArsitektur as $a){
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($a->getNama()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($a->getTipe()) .'</td>';
            $tbody .= '<td>'. htmlspecialchars(substr($a->getDeskripsi(),0,80)) . (strlen($a->getDeskripsi())>80 ? '...' : '') .'</td>';
            $tbody .= '<td>'. ($a->getKepatuhanFIA() ? 'Ya' : 'Tidak') .'</td>';
            $tbody .= '<td>
                            <a href="index.php?entity=arsitektur&screen=edit&id='. $a->getId() .'" class="btn-edit">Edit</a>
                            <a href="index.php?entity=arsitektur&action=delete&id='. $a->getId() .'" 
                            class="btn-delete" 
                            onclick="return confirm(\'Hapus data ini?\')">Hapus</a>
                        </td>';

            $tbody .= '</tr>';
            $no++;
        }

        // Reuse skin.html but replace title and add button link
        $templatePath = __DIR__ . '/../template/skin_arsitektur.html';
        $template = '';
        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            // change heading "Daftar Pembalap" to "Daftar Arsitektur Mobil" and change active nav
            $template = str_replace('<a href="index.php?entity=pembalap" class="active">Pembalap</a>', '<a href="index.php?entity=pembalap">Pembalap</a>', $template);
            $template = str_replace('<a href="index.php?entity=arsitektur">Arsitektur Mobil</a>', '<a href="index.php?entity=arsitektur" class="active">Arsitektur Mobil</a>', $template);
            $template = str_replace('<h1>Daftar Pembalap</h1>', '<h1>Daftar Arsitektur Mobil</h1>', $template);
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);
            $template = str_replace('<a href="index.php?entity=pembalap&screen=add" class="btn btn-add" id="btn-add">+ Tambah Pembalap</a>', '<a href="index.php?entity=arsitektur&screen=add" class="btn btn-add" id="btn-add">+ Tambah Arsitektur</a>', $template);
            $template = str_replace('<div style="color:var(--muted);font-size:13px">Total:', '<div style="color:var(--muted);font-size:13px">Total:', $template);
            return $template;
        }

        return $tbody;
    }

    public function tampilFormArsitektur($data = null): string {
        $template = file_get_contents(__DIR__ . '/../template/form_arsitektur.html');
        if ($data) {
            // set values
            $template = str_replace('value="add" id="arsitektur-action"', 'value="edit" id="arsitektur-action"', $template);
            $template = str_replace('value="" id="arsitektur-id"', 'value="' . htmlspecialchars($data['id']) . '" id="arsitektur-id"', $template);
            $template = str_replace('id="nama" name="nama" type="text" placeholder="Nama komponen"', 'id="nama" name="nama" type="text" placeholder="Nama komponen" value="' . htmlspecialchars($data['nama']) . '"', $template);
            $template = str_replace('id="tipe" name="tipe"', 'id="tipe" name="tipe" value="' . htmlspecialchars($data['tipe']) . '"', $template);
            $template = str_replace('id="deskripsi" name="deskripsi">', 'id="deskripsi" name="deskripsi">' . htmlspecialchars($data['deskripsi']), $template);
            $template = str_replace('id="kepatuhanFIA" name="kepatuhanFIA"', 'id="kepatuhanFIA" name="kepatuhanFIA" ' . ($data['kepatuhanFIA'] ? 'checked' : ''), $template);
        }
        return $template;
    }
}

?>
