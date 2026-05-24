@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="text-indigo-500 hover:underline text-sm font-semibold">← Kembali</a>
        <h1 class="text-3xl font-extrabold text-slate-800 mt-2">Edit Kategori</h1>
        <p class="text-slate-500 mt-1">Perbarui nama kategori di bawah ini</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                       class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('name') ? 'border-red-400' : 'border-slate-200' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                @error('name')
                <p class="mt-2 text-xs text-red-500 font-semibold">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div class="p-4 bg-slate-50 rounded-xl">
                <p class="text-xs text-slate-500 font-semibold">Slug saat ini:</p>
                <p class="text-sm font-bold text-indigo-600 mt-1">{{ $category->slug }}</p>
                <p class="text-xs text-slate-400 mt-1">Slug akan otomatis diperbarui saat kamu simpan.</p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 transition">
                    Update Kategori
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-center transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection