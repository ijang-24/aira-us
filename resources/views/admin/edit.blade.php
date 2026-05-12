@extends('layouts.app')

@section('title', 'Edit Berita: ' . $article->title)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-12">
        <a href="{{ route('admin.index') }}" class="text-rose-500-custom font-bold flex items-center gap-2 mb-4 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
        <h1 class="text-4xl font-black tracking-tighter">Edit Berita</h1>
        <p class="text-slate-400 font-medium mt-2">Perbarui informasi berita agar tetap akurat dan menarik.</p>
    </div>

    @if ($errors->any())
        <div class="bg-rose-50 text-rose-500 p-5 rounded-2xl border border-rose-100 mb-10">
            <ul class="list-disc list-inside font-bold">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="space-y-2">
            <label for="title" class="text-sm font-black uppercase tracking-widest text-slate-400">Judul Berita</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" 
                class="w-full px-6 py-4 bg-white border border-rose-50 rounded-2xl focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500-custom outline-none transition font-bold text-lg" 
                placeholder="Masukkan judul yang menarik..." required>
        </div>

        <div class="space-y-2">
            <label for="image" class="text-sm font-black uppercase tracking-widest text-slate-400">Ganti Gambar Sampul (Opsional)</label>
            
            @if($article->image_path)
                <div class="mb-4">
                    <p class="text-xs text-slate-400 mb-2 font-bold uppercase tracking-wider">Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $article->image_path) }}" class="h-40 w-full object-cover rounded-2xl border border-rose-50 shadow-sm" alt="">
                </div>
            @endif

            <div class="relative group">
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-6 py-4 bg-white border border-rose-50 rounded-2xl focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500-custom outline-none transition font-medium text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-black file:bg-rose-50-custom file:text-rose-500-custom hover:file:bg-rose-100 transition">
            </div>
            <p class="text-xs text-slate-400 mt-2 font-medium">Format: JPG, PNG, GIF. Max: 2MB. Biarkan kosong jika tidak ingin mengganti gambar.</p>
        </div>

        <div class="space-y-2">
            <label for="content" class="text-sm font-black uppercase tracking-widest text-slate-400">Konten Berita</label>
            <textarea name="content" id="content" rows="10" 
                class="w-full px-6 py-4 bg-white border border-rose-50 rounded-2xl focus:ring-4 focus:ring-rose-500/10 focus:border-rose-500-custom outline-none transition font-medium leading-relaxed" 
                placeholder="Tulis isi berita di sini..." required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-rose-500-custom text-white py-5 rounded-2xl font-black text-lg hover-rose-600 transition shadow-xl shadow-rose-200 flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
