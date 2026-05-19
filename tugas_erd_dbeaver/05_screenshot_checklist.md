# Checklist Screenshot DBeaver

Gunakan checklist ini saat mengambil screenshot untuk laporan tugas ERD.

## Persiapan Database

- [ ] Screenshot koneksi MySQL di DBeaver.
- [ ] Screenshot database `erd_filament_blog` sudah muncul di navigator DBeaver.
- [ ] Screenshot query `DROP DATABASE`, `CREATE DATABASE`, dan `USE erd_filament_blog` berhasil dijalankan.

## Struktur Tabel

- [ ] Screenshot daftar tabel pada database `erd_filament_blog`.
- [ ] Screenshot struktur tabel `users`.
- [ ] Screenshot struktur tabel `categories`.
- [ ] Screenshot struktur tabel `posts`.
- [ ] Screenshot struktur tabel `tags`.
- [ ] Screenshot struktur tabel `post_tag`.
- [ ] Screenshot struktur tabel `comments`.

## ERD / Diagram Relasi

- [ ] Screenshot ERD DBeaver yang menampilkan semua tabel.
- [ ] Screenshot relasi `users` ke `posts`.
- [ ] Screenshot relasi `categories` ke `posts`.
- [ ] Screenshot relasi `posts` ke `post_tag`.
- [ ] Screenshot relasi `tags` ke `post_tag`.
- [ ] Screenshot relasi `posts` ke `comments`.
- [ ] Screenshot relasi `users` ke `comments`.

## Data Dummy

- [ ] Screenshot hasil `SELECT * FROM users`.
- [ ] Screenshot hasil `SELECT * FROM categories`.
- [ ] Screenshot hasil `SELECT * FROM posts`.
- [ ] Screenshot hasil `SELECT * FROM tags`.
- [ ] Screenshot hasil `SELECT * FROM post_tag`.
- [ ] Screenshot hasil `SELECT * FROM comments`.

## CRUD Manual

- [ ] Screenshot hasil `INSERT` data dummy berhasil dijalankan.
- [ ] Screenshot hasil contoh `UPDATE` aman.
- [ ] Screenshot hasil data setelah `UPDATE`.
- [ ] Screenshot hasil contoh `DELETE` aman.
- [ ] Screenshot hasil data setelah `DELETE`.

## Query Analisa

- [ ] Screenshot query post lengkap dengan author dan kategori.
- [ ] Screenshot query jumlah post berdasarkan status.
- [ ] Screenshot query jumlah post per kategori.
- [ ] Screenshot query tag paling sering dipakai.
- [ ] Screenshot query jumlah komentar per post.
- [ ] Screenshot query komentar pending.

## Catatan Pengambilan Screenshot

- [ ] Pastikan nama database `erd_filament_blog` terlihat.
- [ ] Pastikan nama tabel terlihat jelas.
- [ ] Pastikan hasil query tidak terpotong.
- [ ] Pastikan ERD menampilkan garis relasi foreign key.
- [ ] Pastikan screenshot disusun berurutan sesuai bagian laporan.
