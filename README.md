# KontenManage App

Aplikasi admin panel Laravel Filament untuk UTS Praktikum, hasil transformasi ERD, DDL, DML menjadi CRUD admin panel.

## Tech Stack

- Laravel 12
- Filament v5.6.3
- MySQL (database: filament_app)
- PHP 8.2

## Fitur

- CRUD Users (admin, author, reader)
- CRUD Categories
- CRUD Posts (dengan relasi category, tags, user)
- CRUD Tags
- CRUD Comments
- Upload gambar (featured_image)
- Select relationship di form
- Badge status di table

## Instalasi

`ash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=UtsSeeder
php artisan storage:link
php artisan serve
`

## Login Admin

- Email: admin@admin.com
- Password: password

## ERD

Relasi antar tabel:
- User hasMany Post, Comment
- Category hasMany Post
- Post belongsTo User, Category
- Post belongsToMany Tag (pivot: post_tag)
- Tag belongsToMany Post
- Post hasMany Comment
- Comment belongsTo Post, User
