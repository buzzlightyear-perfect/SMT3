<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $profile = [
        'name' => 'Steve Developer',
        'title' => 'Web Developer & Minecraft Builder',
        'tagline' => 'Mahasiswa SMT 3 — membangun web seasyik membangun dunia block!',
        'location' => 'Overworld, Indonesia',
        'email' => 'steve@email.com',
        'education' => 'Kuliah Semester 3 — PWL (Laravel)',
        'status' => 'Open for magang & freelance',
        // TARUH FOTO PROFIL di: public/images/profile.jpg (JPG/PNG bebas, nama harus sama)
        'photo' => 'images/profile.jpg',
    ];

    $about = [
        'Halo! Saya Steve Developer, mahasiswa Semester 3 yang jatuh cinta pada web development dan dunia block. Sama seperti di Minecraft, saya percaya aplikasi yang bagus dibangun blok per blok: rapi, kokoh, dan menyenangkan.',
        'Saat ini saya mendalami Laravel (MVC, routing, Blade, database MySQL) dan Tailwind CSS. Senjata utama saya adalah ketelitian memecah masalah besar jadi task-task kecil — lalu menyelesaikannya satu per satu sampai "Achievement Get!".',
    ];

    $skills = [
        ['name' => 'PHP & Laravel', 'level' => 80, 'icon' => '🟥'],
        ['name' => 'HTML & CSS', 'level' => 90, 'icon' => '🟧'],
        ['name' => 'Tailwind CSS', 'level' => 85, 'icon' => '🟦'],
        ['name' => 'JavaScript', 'level' => 70, 'icon' => '🟨'],
        ['name' => 'MySQL', 'level' => 75, 'icon' => '⬜'],
        ['name' => 'Git & GitHub', 'level' => 80, 'icon' => '⬛'],
    ];

    $certificates = [
        ['title' => 'Belajar Dasar PHP', 'by' => 'Dicoding', 'year' => '2024', 'icon' => '🏆'],
        ['title' => 'Front-End Pemula', 'by' => 'Dicoding', 'year' => '2024', 'icon' => '🏅'],
        ['title' => 'Git & GitHub Dasar', 'by' => 'Online Course', 'year' => '2025', 'icon' => '🎖️'],
    ];

    // TARUH FOTO PROJECT di: public/images/projects/namafile.jpg (lihat kolom photo)
    $projects = [
        ['icon' => '🏰', 'photo' => 'images/projects/kasir.jpg', 'title' => 'Castle Kasir', 'desc' => 'Sistem kasir: produk, transaksi, laporan harian.', 'tech' => ['Laravel', 'MySQL']],
        ['icon' => '📦', 'photo' => 'images/projects/inventory.jpg', 'title' => 'Chest Inventory', 'desc' => 'CRUD barang ala inventory chest Minecraft.', 'tech' => ['Laravel', 'Blade']],
        ['icon' => '🗺️', 'photo' => 'images/projects/landing.jpg', 'title' => 'Village Landing', 'desc' => 'Landing page UMKM ringan dan cepat.', 'tech' => ['HTML', 'Tailwind']],
        ['icon' => '📜', 'photo' => 'images/projects/todo.jpg', 'title' => 'Quest Todo', 'desc' => 'Todo app: tambah, selesai, hapus quest.', 'tech' => ['JS', 'CSS']],
        ['icon' => '📚', 'photo' => 'images/projects/perpus.jpg', 'title' => 'Library Craft', 'desc' => 'Perpustakaan mini: buku & peminjaman.', 'tech' => ['Laravel', 'MySQL']],
        ['icon' => '💎', 'photo' => 'images/projects/blog.jpg', 'title' => 'Diamond Blog', 'desc' => 'Blog sederhana dengan halaman detail.', 'tech' => ['Laravel', 'Tailwind']],
    ];

    return view('portfolio', compact('profile', 'about', 'skills', 'certificates', 'projects'));
});
