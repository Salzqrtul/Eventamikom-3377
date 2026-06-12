@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800">Manajemen Kategori</h1>
            <p class="text-slate-500 mt-1">Kelola semua kategori event di sini</p>
        </div>
        <a href="{{ route('admin.categories.create') }}"
           class="flex items-center gap-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition">
            + Tambah Kategori
        </a>
    </div>

    {{-- Alert --}}
    @if(session('success'))
    <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">
        <span class="text-xl">✅</span>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    {{-- Search --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-6">
        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex gap-3">
            <input type="text" name="search" value="{{ $search }}"
                   placeholder="🔍  Cari nama kategori..."
                   class="flex-1 px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
            <button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition">
                Cari
            </button>
            @if($search)
            <a href="{{ route('admin.categories.index') }}"
               class="px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold rounded-xl transition">
                Reset
            </a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest text-slate-400">#</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest text-slate-400">Nama</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest text-slate-400">Slug</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest text-slate-400">Dibuat</th>
                    <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest text-slate-400">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-slate-400 font-medium">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">
                        <span class="font-bold text-slate-800">{{ $category->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-lg">{{ $category->slug }}</span>
                    </td>
                    <td class="px-6 py-4 text-slate-500">{{ $category->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                               class="px-4 py-2 bg-amber-50 hover:bg-amber-100 text-amber-600 font-bold text-xs rounded-xl transition">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus kategori {{ $category->name }}?')"
                                        class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs rounded-xl transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-slate-400">
                            <span class="text-5xl">🏷️</span>
                            <p class="font-semibold">Belum ada data kategori</p>
                            <a href="{{ route('admin.categories.create') }}" class="text-indigo-500 hover:underline text-sm">+ Tambah sekarang</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($categories->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $categories->appends(['search' => $search])->links() }}
        </div>
        @endif
    </div>
</div>
@endsection