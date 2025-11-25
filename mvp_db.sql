-- =========================================================
--  DATABASE: mvp_db
--  STRUCTURE FOR: pembalap & arsitektur_mobil
-- =========================================================

CREATE DATABASE IF NOT EXISTS mvp_db;
USE mvp_db;

-- =========================================================
-- TABLE: pembalap
-- =========================================================
DROP TABLE IF EXISTS pembalap;
CREATE TABLE pembalap (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tim VARCHAR(100) NOT NULL,
    negara VARCHAR(100) NOT NULL,
    poinMusim INT NOT NULL DEFAULT 0,
    jumlahMenang INT NOT NULL DEFAULT 0
);

-- =========================================================
-- TABLE: arsitektur_mobil
-- =========================================================
DROP TABLE IF EXISTS arsitektur_mobil;
CREATE TABLE arsitektur_mobil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(150) NOT NULL,
    tipe VARCHAR(100) NOT NULL,
    deskripsi TEXT NOT NULL,
    kepatuhanFIA TINYINT(1) NOT NULL DEFAULT 1
);

-- =========================================================
-- SAMPLE DATA — Pembalap (banyak)
-- =========================================================
INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) VALUES
('Lewis Hamilton', 'Mercedes', 'Inggris', 387, 103),
('Max Verstappen', 'Red Bull', 'Belanda', 575, 62),
('Charles Leclerc', 'Ferrari', 'Monako', 302, 7),
('Lando Norris', 'McLaren', 'Inggris', 289, 1),
('Carlos Sainz', 'Ferrari', 'Spanyol', 247, 3),
('George Russell', 'Mercedes', 'Inggris', 211, 1),
('Sergio Perez', 'Red Bull', 'Meksiko', 205, 6),
('Oscar Piastri', 'McLaren', 'Australia', 193, 1),
('Fernando Alonso', 'Aston Martin', 'Spanyol', 183, 32),
('Nico Hulkenberg', 'Haas', 'Jerman', 92, 0),
('Pierre Gasly', 'Alpine', 'Prancis', 78, 1),
('Yuki Tsunoda', 'RB Honda', 'Jepang', 65, 0),
('Valtteri Bottas', 'Sauber', 'Finlandia', 41, 10),
('Guanyu Zhou', 'Sauber', 'Cina', 28, 0),
('Alex Albon', 'Williams', 'Thailand', 33, 0),
('Logan Sargeant', 'Williams', 'Amerika', 9, 0);

-- =========================================================
-- SAMPLE DATA — Arsitektur Mobil (banyak)
-- =========================================================
INSERT INTO arsitektur_mobil (nama, tipe, deskripsi, kepatuhanFIA) VALUES
('Underfloor Diffuser V1', 'Aerodinamika', 'Diffuser generasi pertama untuk meningkatkan ground-effect downforce secara progresif.', 1),
('Underfloor Diffuser V2', 'Aerodinamika', 'Versi lanjutan dengan efisiensi 15% lebih baik di kecepatan tinggi.', 1),
('Front Wing Spec-A', 'Aerodinamika', 'Sayap depan generasi awal untuk drag reduction — digunakan saat awal musim.', 1),
('Lightweight Fuel Tank', 'Fuel System', 'Tangki bahan bakar ultra ringan namun tetap memenuhi standar keaman FIA.', 1),
('Hybrid Energy Module X1', 'Power Unit', 'Modul hybrid dengan peningkatan pemulihan energi hingga 12%.', 1),
('Active Suspension Mock', 'Suspension', 'Konsep suspensi aktif — dilarang FIA tetapi dipertahankan sebagai riset internal.', 0),
('Brake Cooling Channel R3', 'Brake System', 'Saluran pendingin rem yang lebih efisien untuk mengurangi overheating.', 1),
('ERS Cooling Jacket', 'Power Unit', 'Jaket pendingin ERS dengan peningkatan thermal efficiency.', 1),
('Diffuser Experimental Z', 'Aerodinamika', 'Desain eksperimental yang belum lolos evaluasi CFD.', 0),
('Monocoque Carbon RS7', 'Chassis', 'Struktur monocoque karbon generasi ke-7 dengan rigiditas meningkat.', 1);
