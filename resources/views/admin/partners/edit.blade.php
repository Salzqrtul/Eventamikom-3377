@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.partners.index') }}" class="text-indigo-500 hover:underline text-sm font-semibold">← Kembali</a>
        <h1 class="text-3xl font-extrabold text-slate-800 mt-2">Edit Partner</h1>
        <p class="text-slate-500 mt-1">Perbarui informasi partner di bawah ini</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('admin.partners.update', $partner) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')

            {{-- Preview Logo --}}
            @if($partner->logo_url)
            <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-xl border border-slate-200">
                <div class="w-16 h-16 rounded-xl border border-slate-200 bg-white flex items-center justify-center p-2 overflow-hidden">
                    <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}" class="w-full h-full object-contain">
                </div>
                <div>
                    <p class="text-xs text-slate-500 font-semibold">Logo saat ini</p>
                    <p class="text-sm font-bold text-slate-800 mt-1">{{ $partner->name }}</p>
                </div>
            </div>
            @endif

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Partner</label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}"
                       class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('name') ? 'border-red-400' : 'border-slate-200' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                @error('name')
                <p class="mt-2 text-xs text-red-500 font-semibold">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">URL Logo</label>
                <input type="text" name="logo_url" value="{{ old('logo_url', $partner->logo_url) }}"
                       class="w-full px-4 py-3 bg-slate-50 border {{ $errors->has('logo_url') ? 'border-red-400' : 'border-slate-200' }} rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                @error('logo_url')
                <p class="mt-2 text-xs text-red-500 font-semibold">⚠️ {{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 transition">
                    Update Partner
                </button>
                <a href="{{ route('admin.partners.index') }}"
                   class="flex-1 py-3 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-center transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection