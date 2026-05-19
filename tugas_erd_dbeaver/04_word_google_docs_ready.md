# Tugas ERD - Desain Database MySQL via DBeaver

## Judul

Desain Database Sistem Blog / Content Management Laravel Filament Menggunakan MySQL dan DBeaver

## Deskripsi Tugas

Tugas ini membahas perancangan database untuk sistem Blog / Content Management yang sesuai dengan konsep project Laravel Filament. Database utama project Laravel bernama `filament_app`, tetapi untuk kebutuhan tugas ERD dibuat database baru bernama `erd_filament_blog` agar tidak mengganggu database utama.

Sistem blog ini memiliki fitur utama untuk mengelola user, kategori, post, tag, relasi post dengan tag, serta komentar. Struktur database dirancang menggunakan relasi primary key dan foreign key agar data saling terhubung dengan baik.

## Tujuan Pembelajaran

1. Memahami proses perancangan Entity Relationship Diagram (ERD).
2. Memahami hubungan one-to-many dan many-to-many antar tabel.
3. Membuat database dan tabel menggunakan DDL di MySQL.
4. Mengisi data dummy menggunakan DML.
5. Melakukan operasi CRUD manual melalui query SQL.
6. Melakukan analisa data menggunakan query JOIN, GROUP BY, dan filter data.
7. Menggunakan DBeaver untuk membuat, menjalankan, dan mendokumentasikan database.

## Bagian 1: Refinement ERD Individual

Database yang dibuat bernama `erd_filament_blog`. Database ini memiliki enam tabel utama:

1. `users`
2. `categories`
3. `posts`
4. `tags`
5. `post_tag`
6. `comments`

Relasi antar tabel:

- `users` ke `posts` adalah one-to-many, karena satu user dapat menulis banyak post.
- `categories` ke `posts` adalah one-to-many, karena satu kategori dapat memiliki banyak post.
- `posts` ke `tags` adalah many-to-many melalui tabel pivot `post_tag`.
- `posts` ke `comments` adalah one-to-many, karena satu post dapat memiliki banyak komentar.
- `users` ke `comments` adalah one-to-many, karena satu user dapat menulis banyak komentar.

Tabel `post_tag` digunakan sebagai tabel penghubung antara `posts` dan `tags`. Tabel ini menggunakan composite primary key dari kolom `post_id` dan `tag_id`.

## Bagian 2: DDL

DDL digunakan untuk membuat struktur database. Query DDL berisi perintah:

- `DROP DATABASE IF EXISTS erd_filament_blog`
- `CREATE DATABASE erd_filament_blog`
- `USE erd_filament_blog`
- `CREATE TABLE users`
- `CREATE TABLE categories`
- `CREATE TABLE posts`
- `CREATE TABLE tags`
- `CREATE TABLE post_tag`
- `CREATE TABLE comments`

Setiap tabel memiliki primary key. Beberapa tabel juga memiliki unique key, seperti:

- `users.email`
- `categories.slug`
- `posts.slug`
- `tags.slug`

Foreign key digunakan untuk menjaga relasi antar tabel. Contohnya:

- `posts.user_id` mengarah ke `users.id`
- `posts.category_id` mengarah ke `categories.id`
- `post_tag.post_id` mengarah ke `posts.id`
- `post_tag.tag_id` mengarah ke `tags.id`
- `comments.post_id` mengarah ke `posts.id`
- `comments.user_id` mengarah ke `users.id`

Beberapa kolom menggunakan tipe data `ENUM`, seperti:

- `users.role` dengan nilai `admin`, `author`, dan `reader`
- `categories.status` dengan nilai `active` dan `inactive`
- `posts.status` dengan nilai `draft`, `published`, dan `archived`
- `comments.status` dengan nilai `pending`, `approved`, dan `rejected`

## Bagian 3: DML dan CRUD Manual

DML digunakan untuk mengisi data dummy ke dalam tabel. Data dummy dibuat untuk tabel:

- `users`
- `categories`
- `posts`
- `tags`
- `post_tag`
- `comments`

Operasi CRUD manual yang dilakukan:

1. Create
   - Menggunakan `INSERT INTO` untuk menambahkan data user, kategori, post, tag, relasi post-tag, dan komentar.

2. Read
   - Menggunakan `SELECT * FROM` untuk menampilkan isi seluruh tabel.

3. Update
   - Menggunakan `UPDATE` dengan kondisi `WHERE` agar perubahan data aman dan spesifik.

4. Delete
   - Menggunakan `DELETE` dengan kondisi `WHERE` agar data yang dihapus hanya data tertentu.

## Objektif Data

Objektif data dalam database ini adalah mendukung sistem blog sederhana yang dapat:

1. Menyimpan data user sebagai admin, author, atau reader.
2. Menyimpan kategori artikel.
3. Menyimpan post atau artikel blog.
4. Menyimpan tag untuk pengelompokan post.
5. Menghubungkan post dengan banyak tag.
6. Menyimpan komentar dari user maupun guest.
7. Memisahkan status post dan komentar agar proses moderasi dapat dilakukan.

## Analisa Data

Query analisa yang digunakan dalam tugas ini meliputi:

1. Post lengkap dengan author dan kategori
   - Digunakan untuk melihat daftar post beserta nama penulis dan nama kategorinya.

2. Jumlah post berdasarkan status
   - Digunakan untuk mengetahui jumlah post dengan status `draft`, `published`, dan `archived`.

3. Jumlah post per kategori
   - Digunakan untuk mengetahui kategori mana yang memiliki post paling banyak.

4. Tag paling sering dipakai
   - Digunakan untuk mengetahui tag yang paling banyak digunakan oleh post.

5. Jumlah komentar per post
   - Digunakan untuk mengetahui post yang paling banyak mendapatkan komentar.

6. Komentar pending
   - Digunakan untuk menampilkan komentar yang masih menunggu moderasi.

## Kesimpulan

Database `erd_filament_blog` dirancang untuk sistem Blog / Content Management yang sesuai dengan konsep Laravel Filament. Struktur database terdiri dari enam tabel utama yang saling berelasi menggunakan primary key dan foreign key.

Relasi one-to-many digunakan pada hubungan user dengan post, kategori dengan post, post dengan komentar, dan user dengan komentar. Relasi many-to-many digunakan pada hubungan post dengan tag melalui tabel pivot `post_tag`.

Dengan rancangan ini, data blog dapat dikelola secara terstruktur, aman, dan mudah dianalisis menggunakan query SQL. Database ini juga dapat menjadi dasar pengembangan fitur Content Management di Laravel Filament.

## Checklist Screenshot

Screenshot yang perlu dilampirkan:

1. Screenshot database `erd_filament_blog` di DBeaver.
2. Screenshot hasil eksekusi query DDL.
3. Screenshot daftar tabel yang berhasil dibuat.
4. Screenshot ERD dari DBeaver yang menampilkan semua tabel dan relasi.
5. Screenshot isi tabel `users`.
6. Screenshot isi tabel `categories`.
7. Screenshot isi tabel `posts`.
8. Screenshot isi tabel `tags`.
9. Screenshot isi tabel `post_tag`.
10. Screenshot isi tabel `comments`.
11. Screenshot hasil query post lengkap dengan author dan kategori.
12. Screenshot hasil query jumlah post berdasarkan status.
13. Screenshot hasil query jumlah post per kategori.
14. Screenshot hasil query tag paling sering dipakai.
15. Screenshot hasil query jumlah komentar per post.
16. Screenshot hasil query komentar pending.
