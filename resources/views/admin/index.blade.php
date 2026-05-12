@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex justify-between items-end mb-12">
    <div>
        <h1 class="text-4xl font-black tracking-tighter">Kelola Berita</h1>
        <p class="text-slate-400 font-medium mt-2">Daftar semua berita yang telah dipublikasikan.</p>
    </div>
    <a href="{{ route('admin.create') }}" class="bg-rose-500-custom text-white px-8 py-4 rounded-2xl font-bold hover-rose-600 transition shadow-xl shadow-rose-100 flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Tulis Berita Baru
    </a>
</div>

@if(session('success'))
    <div class="bg-emerald-50 text-emerald-600 p-5 rounded-2xl border border-emerald-100 mb-10 font-bold flex items-center gap-3 animate-bounce">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="bg-white border border-rose-50 rounded-[2.5rem] overflow-hidden shadow-sm">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-rose-50-custom text-[10px] font-black uppercase tracking-widest text-rose-400">
                <th class="px-8 py-5">Judul</th>
                <th class="px-8 py-5">Tanggal</th>
                <th class="px-8 py-5 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-rose-50">
            @forelse($articles as $article)
                <tr class="hover:bg-rose-50/30 transition">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-4">
                            @if($article->image_path)
                                <img src="{{ asset('storage/' . $article->image_path) }}" class="h-12 w-12 rounded-xl object-cover" alt="">
                            @else
                                <div class="h-12 w-12 rounded-xl bg-rose-50 flex items-center justify-center text-rose-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="font-bold text-slate-700">{{ $article->title }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-sm text-slate-400 font-medium">{{ $article->created_at->format('d M Y') }}</span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('admin.edit', $article->id) }}" class="p-2 text-sky-500 hover:bg-sky-50 rounded-xl transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-8 py-20 text-center text-slate-300 font-bold italic">Belum ada berita.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
