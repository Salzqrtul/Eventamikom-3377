<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-50 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-graduation-cap text-3xl text-indigo-600"></i>
                <h1 class="text-2xl font-bold text-indigo-700">AmikomEventHub</h1>
            </div>
            <div class="flex gap-3">
                <a href="/" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Home</a>
                <a href="/profil" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-2xl transition-all">Profil</a>
                <a href="/katalog" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Katalog</a>
                <a href="/bantuan" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Bantuan</a>
                <a href="/kontak" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-2xl transition-all">Kontak</a>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="bg-white rounded-3xl shadow-xl p-10">
            <div class="flex flex-col md:flex-row gap-10 items-center">
                <!-- Avatar -->
                <div class="w-48 h-48 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl flex items-center justify-center text-white text-8xl shadow-inner">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <!-- Info -->
                <div class="flex-1">
                    <h1 class="text-5xl font-bold text-gray-800">SALSABILA QURATUL AINI</h1>
                    <p class="text-indigo-600 text-2xl mt-2">Mahasiswa • Universitas Amikom Yogyakarta</p>
                    <div class="mt-8 grid grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <p class="text-sm text-gray-500">NIM</p>
                            <p class="text-3xl font-semibold">24.12.3377</p>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-2xl">
                            <p class="text-sm text-gray-500">Program Studi</p>
                            <p class="text-3xl font-semibold">S1 Sistem Informasi</p>
                        </div>
                    </div>
                    <p class="mt-8 text-lg text-gray-600 leading-relaxed">
                       Email : salsabilaqrtul@students.amikom.ac.id
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>