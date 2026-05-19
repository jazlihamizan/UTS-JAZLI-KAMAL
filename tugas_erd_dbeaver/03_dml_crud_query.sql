USE erd_filament_blog;

-- INSERT data dummy users
INSERT INTO users (name, email, role, password, email_verified_at) VALUES
('Admin Filament', 'admin@example.com', 'admin', '$2y$10$dummyhashedpasswordadmin', NOW()),
('Budi Author', 'budi@example.com', 'author', '$2y$10$dummyhashedpasswordbudi', NOW()),
('Siti Reader', 'siti@example.com', 'reader', '$2y$10$dummyhashedpasswordsiti', NOW()),
('Dina Author', 'dina@example.com', 'author', '$2y$10$dummyhashedpassworddina', NOW());

-- INSERT data dummy categories
INSERT INTO categories (name, slug, description, status) VALUES
('Laravel', 'laravel', 'Artikel tentang framework Laravel.', 'active'),
('Filament', 'filament', 'Artikel tentang admin panel Filament.', 'active'),
('Database', 'database', 'Artikel tentang desain dan pengelolaan database.', 'active'),
('Tutorial', 'tutorial', 'Panduan langkah demi langkah.', 'active');

-- INSERT data dummy posts
INSERT INTO posts (user_id, category_id, title, slug, excerpt, content, featured_image, status, published_at) VALUES
(2, 1, 'Mengenal Laravel untuk Pemula', 'mengenal-laravel-untuk-pemula', 'Pengenalan dasar Laravel.', 'Laravel adalah framework PHP yang banyak digunakan untuk membangun aplikasi web modern.', 'laravel-pemula.jpg', 'published', '2026-05-01 09:00:00'),
(2, 2, 'Membuat CRUD Post di Filament', 'membuat-crud-post-di-filament', 'Panduan membuat CRUD Post.', 'Filament memudahkan pembuatan panel admin dan CRUD resource di Laravel.', 'crud-filament.jpg', 'published', '2026-05-03 10:30:00'),
(4, 3, 'Dasar ERD untuk Aplikasi Blog', 'dasar-erd-untuk-aplikasi-blog', 'Belajar ERD melalui studi kasus blog.', 'ERD digunakan untuk menggambarkan struktur tabel dan relasi dalam database.', 'erd-blog.jpg', 'draft', NULL),
(4, 4, 'Tips Menulis Artikel Teknis', 'tips-menulis-artikel-teknis', 'Tips membuat artikel teknis yang rapi.', 'Artikel teknis yang baik memiliki struktur jelas, contoh, dan penjelasan yang mudah dipahami.', NULL, 'published', '2026-05-07 14:00:00'),
(1, 2, 'Manajemen Konten dengan Laravel Filament', 'manajemen-konten-dengan-laravel-filament', 'CMS sederhana menggunakan Laravel Filament.', 'Laravel Filament dapat digunakan untuk membangun Content Management System sederhana.', 'cms-filament.jpg', 'archived', '2026-04-20 08:15:00');

-- INSERT data dummy tags
INSERT INTO tags (name, slug) VALUES
('PHP', 'php'),
('Laravel', 'laravel'),
('Filament', 'filament'),
('MySQL', 'mysql'),
('ERD', 'erd'),
('CRUD', 'crud');

-- INSERT data dummy post_tag
INSERT INTO post_tag (post_id, tag_id) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(2, 6),
(3, 4),
(3, 5),
(4, 6),
(5, 2),
(5, 3);

-- INSERT data dummy comments
INSERT INTO comments (post_id, user_id, name, email, body, status) VALUES
(1, 3, 'Siti Reader', 'siti@example.com', 'Artikelnya mudah dipahami untuk pemula.', 'approved'),
(1, NULL, 'Andi Guest', 'andi.guest@example.com', 'Terima kasih, sangat membantu.', 'approved'),
(2, 3, 'Siti Reader', 'siti@example.com', 'Bagian CRUD Filament sangat jelas.', 'pending'),
(2, 4, 'Dina Author', 'dina@example.com', 'Saya akan coba praktikkan di project saya.', 'approved'),
(3, 2, 'Budi Author', 'budi@example.com', 'Materi ERD ini perlu ditambahkan contoh relasi.', 'pending'),
(5, NULL, 'Rina Guest', 'rina.guest@example.com', 'Apakah bisa ditambahkan contoh dashboard?', 'rejected');

-- SELECT semua tabel
SELECT * FROM users;
SELECT * FROM categories;
SELECT * FROM posts;
SELECT * FROM tags;
SELECT * FROM post_tag;
SELECT * FROM comments;

-- Contoh UPDATE aman
-- Mengubah status komentar tertentu berdasarkan primary key.
UPDATE comments
SET status = 'approved'
WHERE id = 3;

-- Contoh UPDATE aman
-- Mengubah status post draft tertentu menjadi published.
UPDATE posts
SET status = 'published',
    published_at = NOW()
WHERE id = 3
  AND status = 'draft';

-- Contoh DELETE aman
-- Menghapus relasi tag tertentu dari post tertentu, bukan menghapus semua data tag.
DELETE FROM post_tag
WHERE post_id = 4
  AND tag_id = 6;

-- Contoh DELETE aman
-- Menghapus komentar rejected tertentu berdasarkan primary key.
DELETE FROM comments
WHERE id = 6
  AND status = 'rejected';

-- Query analisa A: post lengkap dengan author dan kategori
SELECT
    posts.id,
    posts.title,
    posts.slug,
    posts.status,
    posts.published_at,
    users.name AS author,
    categories.name AS category
FROM posts
LEFT JOIN users ON posts.user_id = users.id
LEFT JOIN categories ON posts.category_id = categories.id
ORDER BY posts.created_at DESC;

-- Query analisa B: jumlah post berdasarkan status
SELECT
    status,
    COUNT(*) AS total_posts
FROM posts
GROUP BY status
ORDER BY total_posts DESC;

-- Query analisa C: jumlah post per kategori
SELECT
    categories.name AS category,
    COUNT(posts.id) AS total_posts
FROM categories
LEFT JOIN posts ON posts.category_id = categories.id
GROUP BY categories.id, categories.name
ORDER BY total_posts DESC;

-- Query analisa D: tag paling sering dipakai
SELECT
    tags.name AS tag,
    COUNT(post_tag.post_id) AS total_used
FROM tags
LEFT JOIN post_tag ON post_tag.tag_id = tags.id
GROUP BY tags.id, tags.name
ORDER BY total_used DESC, tags.name ASC;

-- Query analisa E: jumlah komentar per post
SELECT
    posts.title,
    COUNT(comments.id) AS total_comments
FROM posts
LEFT JOIN comments ON comments.post_id = posts.id
GROUP BY posts.id, posts.title
ORDER BY total_comments DESC;

-- Query analisa F: komentar pending
SELECT
    comments.id,
    posts.title AS post_title,
    comments.name AS commenter_name,
    comments.email,
    comments.body,
    comments.created_at
FROM comments
INNER JOIN posts ON comments.post_id = posts.id
WHERE comments.status = 'pending'
ORDER BY comments.created_at ASC;
