-- 1. Membuat Database [cite: 12, 86]
CREATE DATABASE akademik;

-- 2. Menggunakan Database [cite: 14, 88]
USE akademik;

-- 3. Membuat Tabel Mahasiswa [cite: 15, 16, 90]
CREATE TABLE mahasiswa (
    nim CHAR(9) NOT NULL PRIMARY KEY, 
    nama VARCHAR(30), 
    kelamin ENUM('L', 'P'), 
    jurusan ENUM('TI', 'SI', 'MI', 'TK', 'KA') 
);

-- 4. Mengisi Data Contoh (agar tabel tidak kosong) [cite: 103, 104]
INSERT INTO mahasiswa(nim, nama, kelamin, jurusan) 
VALUES('133110001', 'Agus Budianto', 'L', 'MI'); 