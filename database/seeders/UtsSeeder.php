<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtsSeeder extends Seeder
{
    public function run(): void
    {
        // === USERS ===
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
        // Update role if admin already exists
        if ($admin->role !== 'admin') {
            $admin->update(['role' => 'admin']);
        }

        $author1 = User::firstOrCreate(
            ['email' => 'author1@example.com'],
            [
                'name' => 'Budi Santoso',
                'role' => 'author',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $author2 = User::firstOrCreate(
            ['email' => 'author2@example.com'],
            [
                'name' => 'Siti Rahayu',
                'role' => 'author',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $reader = User::firstOrCreate(
            ['email' => 'reader@example.com'],
            [
                'name' => 'Andi Wijaya',
                'role' => 'reader',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // === CATEGORIES ===
        $categories = [];
        $categoryData = [
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Artikel tentang teknologi terbaru', 'status' => 'active'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'description' => 'Tips dan trik gaya hidup', 'status' => 'active'],
            ['name' => 'Education', 'slug' => 'education', 'description' => 'Konten edukasi dan pembelajaran', 'status' => 'active'],
            ['name' => 'Health', 'slug' => 'health', 'description' => 'Informasi kesehatan', 'status' => 'active'],
            ['name' => 'Travel', 'slug' => 'travel', 'description' => 'Panduan wisata dan perjalanan', 'status' => 'inactive'],
        ];

        foreach ($categoryData as $cat) {
            $categories[] = Category::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // === TAGS ===
        $tags = [];
        $tagData = [
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Filament', 'slug' => 'filament'],
            ['name' => 'Tutorial', 'slug' => 'tutorial'],
            ['name' => 'Tips', 'slug' => 'tips'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Database', 'slug' => 'database'],
            ['name' => 'Frontend', 'slug' => 'frontend'],
        ];

        foreach ($tagData as $tag) {
            $tags[] = Tag::firstOrCreate(
                ['slug' => $tag['slug']],
                $tag
            );
        }

        // === POSTS ===
        $postData = [
            [
                'title' => 'Mengenal Laravel Filament v5',
                'slug' => 'mengenal-laravel-filament-v5',
                'excerpt' => 'Panduan lengkap memulai Laravel Filament versi 5 untuk admin panel.',
                'content' => '<p>Laravel Filament adalah framework admin panel yang powerful untuk Laravel. Versi 5 membawa banyak perubahan signifikan termasuk struktur modular yang lebih baik.</p><p>Dalam artikel ini kita akan membahas fitur-fitur baru dan cara menggunakannya.</p>',
                'status' => 'published',
                'user_id' => $admin->id,
                'category_id' => $categories[0]->id,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Tips Belajar Pemrograman untuk Pemula',
                'slug' => 'tips-belajar-pemrograman-pemula',
                'excerpt' => 'Kumpulan tips efektif untuk memulai belajar pemrograman.',
                'content' => '<p>Belajar pemrograman membutuhkan konsistensi dan latihan. Berikut beberapa tips yang bisa membantu pemula memulai perjalanan coding mereka.</p><p>1. Mulai dari dasar<br>2. Praktik setiap hari<br>3. Buat project kecil</p>',
                'status' => 'published',
                'user_id' => $author1->id,
                'category_id' => $categories[2]->id,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Membangun REST API dengan Laravel',
                'slug' => 'membangun-rest-api-laravel',
                'excerpt' => 'Tutorial membuat REST API menggunakan Laravel dari nol.',
                'content' => '<p>REST API adalah standar komunikasi antar aplikasi. Laravel menyediakan tools yang lengkap untuk membangun API yang robust dan scalable.</p>',
                'status' => 'published',
                'user_id' => $author2->id,
                'category_id' => $categories[0]->id,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Gaya Hidup Sehat untuk Programmer',
                'slug' => 'gaya-hidup-sehat-programmer',
                'excerpt' => 'Menjaga kesehatan tubuh dan pikiran sebagai programmer.',
                'content' => '<p>Sebagai programmer, kita sering menghabiskan waktu berjam-jam di depan komputer. Penting untuk menjaga kesehatan dengan olahraga teratur dan pola makan seimbang.</p>',
                'status' => 'draft',
                'user_id' => $author1->id,
                'category_id' => $categories[3]->id,
                'published_at' => null,
            ],
            [
                'title' => 'Database Design Best Practices',
                'slug' => 'database-design-best-practices',
                'excerpt' => 'Praktik terbaik dalam merancang database relasional.',
                'content' => '<p>Desain database yang baik adalah fondasi aplikasi yang solid. Artikel ini membahas normalisasi, indexing, dan relasi antar tabel.</p>',
                'status' => 'published',
                'user_id' => $admin->id,
                'category_id' => $categories[2]->id,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Wisata Alam Indonesia yang Wajib Dikunjungi',
                'slug' => 'wisata-alam-indonesia',
                'excerpt' => 'Rekomendasi destinasi wisata alam terbaik di Indonesia.',
                'content' => '<p>Indonesia memiliki keindahan alam yang luar biasa. Dari Sabang sampai Merauke, banyak destinasi yang menunggu untuk dijelajahi.</p>',
                'status' => 'archived',
                'user_id' => $author2->id,
                'category_id' => $categories[4]->id,
                'published_at' => now()->subDays(30),
            ],
        ];

        $posts = [];
        foreach ($postData as $data) {
            $posts[] = Post::firstOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }

        // === POST_TAG (pivot) ===
        // Attach tags to posts (sync won't duplicate)
        $posts[0]->tags()->syncWithoutDetaching([$tags[0]->id, $tags[2]->id, $tags[5]->id]); // Laravel, Filament, Web Dev
        $posts[1]->tags()->syncWithoutDetaching([$tags[3]->id, $tags[4]->id]); // Tutorial, Tips
        $posts[2]->tags()->syncWithoutDetaching([$tags[0]->id, $tags[1]->id, $tags[5]->id]); // Laravel, PHP, Web Dev
        $posts[3]->tags()->syncWithoutDetaching([$tags[4]->id]); // Tips
        $posts[4]->tags()->syncWithoutDetaching([$tags[6]->id, $tags[3]->id]); // Database, Tutorial
        $posts[5]->tags()->syncWithoutDetaching([$tags[4]->id]); // Tips

        // === COMMENTS ===
        $commentData = [
            [
                'post_id' => $posts[0]->id,
                'user_id' => $author1->id,
                'name' => 'Budi Santoso',
                'email' => 'author1@example.com',
                'body' => 'Artikel yang sangat membantu! Terima kasih sudah berbagi.',
                'status' => 'approved',
            ],
            [
                'post_id' => $posts[0]->id,
                'user_id' => $reader->id,
                'name' => 'Andi Wijaya',
                'email' => 'reader@example.com',
                'body' => 'Kapan ada tutorial lanjutannya?',
                'status' => 'approved',
            ],
            [
                'post_id' => $posts[1]->id,
                'user_id' => null,
                'name' => 'Guest User',
                'email' => 'guest@example.com',
                'body' => 'Tips yang sangat berguna untuk pemula seperti saya.',
                'status' => 'pending',
            ],
            [
                'post_id' => $posts[2]->id,
                'user_id' => $author2->id,
                'name' => 'Siti Rahayu',
                'email' => 'author2@example.com',
                'body' => 'REST API memang penting untuk dipelajari.',
                'status' => 'approved',
            ],
            [
                'post_id' => $posts[4]->id,
                'user_id' => $admin->id,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'body' => 'Normalisasi database sangat penting untuk performa.',
                'status' => 'approved',
            ],
            [
                'post_id' => $posts[2]->id,
                'user_id' => null,
                'name' => 'Spammer',
                'email' => 'spam@spam.com',
                'body' => 'Komentar spam yang harus ditolak.',
                'status' => 'rejected',
            ],
        ];

        foreach ($commentData as $comment) {
            Comment::firstOrCreate(
                [
                    'post_id' => $comment['post_id'],
                    'email' => $comment['email'],
                    'body' => $comment['body'],
                ],
                $comment
            );
        }
    }
}
