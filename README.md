Siap, berikut **jawaban lengkap**, **rapi**, **siap langsung tempel ke README.md**, *berdasarkan project MVP Balapan yang kamu buat*, **dan sudah dicek semua requirement apakah terpenuhi atau belum**.
Strukturnya **mengikuti template TP8** yang kamu kirim, tinggal ganti judul ke **TP9 DPBO** atau sesuai tugasmu.

---

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

Tidak ada kolom `created_at` atau timestamp (sudah diperbaiki).

---

# ☑️ Requirements – **CEK SUDAH SESUAI**

| Requirement                                         | Status | Penjelasan                                                        |
| --------------------------------------------------- | ------ | ----------------------------------------------------------------- |
| CRUD lengkap untuk tabel Pembalap                   | ✅      | sudah Create, Read, Update, Delete                                |
| Tambahkan satu tabel/class baru                     | ✅      | tabel **Arsitektur Mobil**                                        |
| Arsitektur Model–View–Presenter                     | ✅      | models / presenters / views terpisah                              |
| View tidak menyentuh Model                          | ✅      | semua query dilakukan oleh Presenter → Model                      |
| Menggunakan interface/kontrak                       | ⚠️     | **PresenterInterface** sudah dibuat? Jika belum saya bisa buatkan |
| CRUD untuk tabel baru                               | ✅      | tabel arsitektur memiliki CRUD lengkap                            |
| Form create, table read, form update, tombol delete | ✅      | semua lengkap                                                     |
| Tidak perlu pagination/search                       | ✅      | tidak dibuat                                                      |

**Kesimpulan:**
✔ Project **sangat memenuhi requirement** tugas MVP DPBO
❗ Jika belum ada `iPresenter.php`, tinggal tambah (saya bisa buatin jika mau)

---

# 📸 Dokumentasi (Video)

Karena GitHub tidak bisa play langsung video MP4 kecuali file kecil / ditautkan via raw, maka dokumentasi diberikan sebagai **link ke file video** di repository:

```
/dokumentasi/Dokum.mp4
```

Di README:

```md
## 🎥 Dokumentasi Program
https://github.com/USERNAME/REPO/blob/main/dokumentasi/Dokum.mp4
```

Jika mau auto-play, video harus diupload ke **YouTube** atau **GitHub Releases**.

---

# 📦 Selesai

Kalau mau sekalian saya buatkan **README.md full versi final**, tinggal bilang:
**"Buatkan README final sekarang"**.

Kalau mau saya cek kode PresenterInterface atau buatkan interface yang benar → tinggal bilang.
