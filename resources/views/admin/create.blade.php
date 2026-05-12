@extends('layouts.app')

@section('title', 'Tulis Berita Baru')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-12">
        <a href="{{ route('admin.index') }}" class="text-black font-bold flex items-center gap-2 mb-6 hover:translate-x-[-4px] transition group w-fit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="border-b-2 border-black/10 group-hover:border-black pb-1">Kembali ke Dashboard</span>
        </a>
        <h1 class="text-4xl font-black tracking-tighter text-black">Tulis Berita Baru</h1>
        <p class="text-slate-500 font-medium mt-3">Bagikan informasi menarik untuk pembaca setia Aira News.</p>
    </div>

    @if ($errors->any())
        <div class="bg-white text-rose-500 p-6 rounded-2xl border-l-4 border-rose-500 mb-10 shadow-sm">
            <ul class="list-disc list-inside font-bold text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
        @csrf
        
        <div class="space-y-3">
            <label for="title" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Judul Berita</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                class="w-full px-8 py-5 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-black/5 focus:border-black outline-none transition font-bold text-xl shadow-sm placeholder:text-slate-200" 
                placeholder="Masukkan judul yang menarik..." required>
        </div>

        <div class="space-y-3">
            <label for="image" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Gambar Sampul</label>
            <div class="relative group">
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-8 py-5 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-black/5 focus:border-black outline-none transition font-medium text-slate-500 file:mr-6 file:py-2 file:px-6 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:tracking-widest file:bg-slate-100 file:text-black hover:file:bg-black hover:file:text-white file:transition shadow-sm">
            </div>
            <p class="text-[10px] text-slate-400 mt-3 font-bold uppercase tracking-wider">Format: JPG, PNG, GIF. Max: 2MB.</p>
        </div>

        <div class="space-y-3">
            <label for="content" class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Konten Berita</label>
            <textarea name="content" id="content" rows="12" 
                class="w-full px-8 py-6 bg-white border border-gray-100 rounded-2xl focus:ring-4 focus:ring-black/5 focus:border-black outline-none transition font-medium leading-relaxed shadow-sm text-lg placeholder:text-slate-200" 
                placeholder="Tulis isi berita di sini..." required>{{ old('content') }}</textarea>
        </div>

        <div class="pt-8">
            <button type="submit" class="w-full btn-primary py-6 rounded-2xl font-black text-xs uppercase tracking-[0.3em] flex items-center justify-center gap-4 shadow-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Publikasikan Sekarang
            </button>
        </div>
    </form>
</div>
@endsection
