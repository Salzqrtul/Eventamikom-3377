<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ========== 1. Akun Admin Utama ==========
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // ========== 2. Insert Kategori Event (MINIMAL 3 KATEGORI) ==========
        // Kategori yang sudah ada sebelumnya
        $category1 = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);
        
        $category2 = \App\Models\Category::firstOrCreate([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment',
        ]);
        
        // >>> TAMBAHAN KATEGORI KE-3 (sesuai tugas minimal 3 kategori)
        $category3 = \App\Models\Category::create([
            'name' => 'E-Sport & Gaming',
            'slug' => 'e-sport-gaming',
        ]);
        
        // >>> TAMBAHAN KATEGORI KE-4 (opsional, lebih variatif)
        $category4 = \App\Models\Category::create([
            'name' => 'Workshop & Bootcamp',
            'slug' => 'workshop-bootcamp',
        ]);

        // ========== 3. Insert Sampel Events (MINIMAL 6 EVENT) ==========
        
        // --- Event 1 (sudah ada dari kode awal) ---
        \App\Models\Event::create([
            'category_id' => $category2->id,
            'title' => 'Jazz Night 2025',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        // --- Event 2 (sudah ada dari kode awal) ---
        \App\Models\Event::create([
            'category_id' => $category1->id,
            'title' => 'Hackaton - Unleash Your Inner Developer',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif untuk tantangan masa depan!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // --- Event 3 (sudah ada dari kode awal) ---
        \App\Models\Event::create([
            'category_id' => $category1->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        // >>> TAMBAHAN EVENT KE-4 (E-Sport U-Champ)
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'E-Sport U-Champ: Mobile Legends Tournament 2026',
            'description' => 'Turnamen Mobile Legends antar universitas se-Indonesia. Total hadiah puluhan juta rupiah!',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Amikom Sport Center',
            'price' => 75000,
            'stock' => 200,
            'poster_path' => 'posters/event-4.png',
        ]);

        // >>> TAMBAHAN EVENT KE-5 (UI/UX Masterclass)
        \App\Models\Event::create([
            'category_id' => $category4->id,
            'title' => 'UI/UX Masterclass with Industry Expert',
            'description' => 'Pelajari prinsip desain UI/UX dari praktisi berpengalaman. Cocok untuk pemula hingga menengah.',
            'date' => '2026-06-20 13:00:00',
            'location' => 'Lab Desain Amikom',
            'price' => 150000,
            'stock' => 50,
            'poster_path' => 'posters/event-5.png',
        ]);

        // >>> TAMBAHAN EVENT KE-6 (Startup Weekend)
        \App\Models\Event::create([
            'category_id' => $category4->id,
            'title' => 'Startup Weekend: From Idea to Pitch',
            'description' => 'Bangun startup kamu hanya dalam 54 jam! Dapatkan mentor dan koneksi investor.',
            'date' => '2026-07-01 08:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 100000,
            'stock' => 80,
            'poster_path' => 'posters/event-6.png',
        ]);

        // >>> TAMBAHAN EVENT KE-7 (opsional, untuk lebih variatif)
        \App\Models\Event::create([
            'category_id' => $category3->id,
            'title' => 'Valorant Campus Championship',
            'description' => 'Kompetisi Valorant antar kampus. Rebutkan gelar juara dan hadiah menarik!',
            'date' => '2026-07-10 10:00:00',
            'location' => 'E-Sport Arena Amikom',
            'price' => 50000,
            'stock' => 120,
            'poster_path' => 'posters/event-7.png',
        ]);
        
        // Menampilkan pesan sukses di terminal
        $this->command->info('✓ Database Seeder berhasil dijalankan!');
        $this->command->info('✓ 4 Kategori telah ditambahkan');
        $this->command->info('✓ 7 Event telah ditambahkan');
    }
}