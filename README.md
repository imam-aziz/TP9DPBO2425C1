# 💻 TP9 DPBO – Imam Azizun Hakim – 2404420

## 🤝 Janji

“Saya Imam Azizun Hakim dengan NIM 2404420 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.”

---

# 🔀 Penjelasan Desain dan Flow Program

Aplikasi ini adalah **Sistem Manajemen Balapan** yang mengelola **data Pembalap** dan **data Arsitektur Mobil**.
Project menggunakan **arsitektur MVP (Model–View–Presenter)**, di mana:

* **Model** = berhubungan dengan database (CRUD via PDO)
* **Presenter** = jembatan antara View ↔ Model (mengolah data, validasi, routing aksi)
* **View** = halaman HTML (tidak boleh query langsung ke database)

Aplikasi dibuat dengan **PHP Native**, **HTML**, dan **CSS Dark Mode**.

---

# 🧩 Penjelasan Class & Struktur MVP

## 🗂 Diagram MVP (Konsep)

```
View  <----present---->  Presenter  <----call----> Model
```

## 📦 Struktur Folder

```
/models
   DB.php
   TabelPembalap.php
   TabelArsitektur.php

/presenters
   PresenterPembalap.php
   PresenterArsitektur.php

/views
   ViewPembalap.php
   ViewArsitektur.php

index.php   <-- Router utama
```

---

# 📘 Penjelasan Setiap Komponen

## 📍 **1. Model (Database Layer)**

### **DB.php**

* Mengatur koneksi database (PDO)
* Menyediakan fungsi `executeSelect()` dan `executeQuery()`
* Digunakan oleh semua Model

### **TabelPembalap.php**

CRUD untuk tabel `pembalap`:

* createPembalap
* getAll
* getById
* updatePembalap
* deletePembalap

Kolom:

```
id (PK)
nama
tim
negara
poin_musim
jumlah_menang
```

### **TabelArsitektur.php**

CRUD untuk tabel `arsitektur`:

```
id (PK)
nama
tipe
deskripsi
fia (boolean)
```

---

## 📍 **2. Presenter (Logic Layer)**

Presenter bertanggung jawab:

* Menangani aksi user (add/edit/delete)
* Mengambil data dari Model
* Mengirim data ke View
* **View tidak pernah menyentuh Model langsung!**

### **PresenterPembalap.php**

* tampilkan semua pembalap
* tambah pembalap
* edit pembalap
* hapus pembalap

### **PresenterArsitektur.php**

* tampilkan daftar arsitektur mobil
* tambah arsitektur
* edit arsitektur
* hapus arsitektur

---

## 📍 **3. View (User Interface)**

### ViewPembalap.php

* Tabel daftar pembalap
* Form tambah/edit
* Tombol Edit/Hapus
* Dark Mode

### ViewArsitektur.php

* Layout clean dark mode
* Tabel daftar arsitektur
* Tombol Edit/Hapus berdampingan (di-fixed)
* Form tambah/edit

---

## 📍 **4. index.php (Router)**

* Menangkap URL seperti:

```
index.php?entity=pembalap
index.php?entity=arsitektur&screen=add
index.php?entity=arsitektur&action=delete&id=3
```

* Presenter menentukan halaman apa yang muncul.

---

# 🔁 Flow Program (MVP)

```
🎯 User membuka index.php?entity=pembalap
⬇
PresenterPembalap mengambil data dari Model TabelPembalap
⬇
Presenter mengirim data ke View
⬇
View menampilkan tabel daftar pembalap
⬇
User klik Tambah/Edit/Hapus
⬇
Presenter memproses aksi → update database → refresh View
```

---

# 🛢 Database

Nama database: **mvp_db**
Tabel:

* pembalap
* arsitektur

---

# ☑️ Requirements – **CEK SUDAH SESUAI**

| Requirement                                         | Status | Penjelasan                                                        |
| --------------------------------------------------- | -------| ----------------------------------------------------------------- |
| CRUD lengkap untuk tabel Pembalap                   | ✅     | sudah Create, Read, Update, Delete                                |
| Tambahkan satu tabel/class baru                     | ✅     | tabel **Arsitektur Mobil**                                        |
| Arsitektur Model–View–Presenter                     | ✅     | models / presenters / views terpisah                              |
| View tidak menyentuh Model                          | ✅     | semua query dilakukan oleh Presenter → Model                      |
| Menggunakan interface/kontrak                       | ✅     | class PresenterPembalap implements KontrakPresenter               |
| CRUD untuk tabel baru                               | ✅     | tabel arsitektur memiliki CRUD lengkap                            |
| Form create, table read, form update, tombol delete | ✅     | semua lengkap                                                     |
| Tidak perlu pagination/search                       | ✅     | tidak dibuat                                                      |
---

# 📸 Dokumentasi (Video)
<video src="dokumentasi/Dokum.mp4" controls="controls" style="max-width: 100%;"></video>
