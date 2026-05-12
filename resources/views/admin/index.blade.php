@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
    <div>
        <h1 class="text-4xl font-black tracking-tighter text-black">Kelola Berita</h1>
        <p class="text-slate-500 font-medium mt-2">Daftar semua berita yang telah dipublikasikan.</p>
    </div>
    <a href="{{ route('admin.create') }}" class="btn-primary px-8 py-4 rounded-2xl font-bold flex items-center gap-3 shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
        Tulis Berita Baru
    </a>
</div>

@if(session('success'))
    <div class="bg-white text-emerald-600 p-6 rounded-2xl border-l-4 border-emerald-500 mb-10 font-bold flex items-center gap-4 shadow-sm">
        <div class="bg-emerald-100 p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        {{ session('success') }}
    </div>
@endif

<div class="bg-white border border-gray-100 rounded-[2rem] overflow-hidden shadow-xl shadow-slate-200/50">
    <table class="w-full text-left">
        <thead>
            <tr class="bg-gray-50 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">
                <th class="px-8 py-6">Judul Berita</th>
                <th class="px-8 py-6">Tanggal Rilis</th>
                <th class="px-8 py-6 text-right">Manajemen</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($articles as $article)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6">
                        <div class="flex items-center gap-5">
                            @if($article->image_path)
                                <img src="{{ asset('storage/' . $article->image_path) }}" class="h-14 w-14 rounded-2xl object-cover shadow-sm border border-gray-100" alt="">
                            @else
                                <div class="h-14 w-14 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            <span class="font-bold text-slate-800 text-base">{{ $article->title }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <span class="text-xs text-slate-400 font-bold uppercase tracking-widest">{{ $article->created_at->format('d M Y') }}</span>
                    </td>
                    <td class="px-8 py-6 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('admin.edit', $article->id) }}" class="p-3 text-slate-600 hover:bg-slate-100 hover:text-black rounded-xl transition shadow-sm bg-white border border-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-3 text-rose-500 hover:bg-rose-50 rounded-xl transition shadow-sm bg-white border border-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-8 py-24 text-center">
                        <div class="flex flex-col items-center opacity-20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 012-2M5 11V9a2 2 0 01-2-2m0 0V5a2 2 0 012-2h14a2 2 0 012 2v2M5 7h14" />
                            </svg>
                            <p class="font-black uppercase tracking-[0.3em] text-xs">Database Kosong</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
