<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 font-sans">
    <!-- Navbar (sama seperti di atas) -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-graduation-cap text-3xl text-indigo-600"></i>
                <h1 class="text-2xl font-bold text-indigo-700">AmikomEventHub</h1>
            </div>
            <div class="flex gap-3">
                <a href="/" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Home</a>
                <a href="/profil" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Profil</a>
                <a href="/katalog" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-2xl transition-all">Katalog</a>
                <a href="/bantuan" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Bantuan</a>
                <a href="/kontak" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Kontak</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-5xl font-bold text-center text-gray-800 mb-4">Katalog Event AmikomEventHub</h1>
        <p class="text-center text-xl text-gray-600 mb-12">Temukan event seru kampus di sini!</p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Event Card 1 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:scale-105 transition-transform">
                <div class="h-2 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
                <div class="p-8">
                    <h3 class="text-2xl font-semibold">Seminar AI &amp; Machine Learning</h3>
                    <p class="text-indigo-600 mt-2">15 April 2026 • Ruang Cinema Amikom</p>
                    <p class="mt-6 text-gray-600">Pelajari tren terkini AI bersama pakar nasional.</p>
                    <button class="mt-8 w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-medium">Daftar Sekarang</button>
                </div>
            </div>
            <!-- Event Card 2 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:scale-105 transition-transform">
                <div class="h-2 bg-gradient-to-r from-purple-500 to-pink-600"></div>
                <div class="p-8">
                    <h3 class="text-2xl font-semibold">Workshop Laravel Full-Stack</h3>
                    <p class="text-indigo-600 mt-2">22 April 2026 • Lab 2.4.2</p>
                    <p class="mt-6 text-gray-600">Belajar membangun aplikasi web modern dengan Laravel 11.</p>
                    <button class="mt-8 w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-medium">Daftar Sekarang</button>
                </div>
            </div>
            <!-- Event Card 3 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:scale-105 transition-transform">
                <div class="h-2 bg-gradient-to-r from-pink-500 to-rose-600"></div>
                <div class="p-8">
                    <h3 class="text-2xl font-semibold">Tech Talk &amp; Career Fair</h3>
                    <p class="text-indigo-600 mt-2">10 Mei 2026 • Ruang Cinema Amikom</p>
                    <p class="mt-6 text-gray-600">Bertemu perusahaan IT dan dapatkan kesempatan magang.</p>
                    <button class="mt-8 w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-medium">Daftar Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>