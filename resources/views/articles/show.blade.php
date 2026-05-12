@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
    
    <!-- Left: Article Content (8 Columns) -->
    <article class="lg:col-span-8">
        <div class="mb-12">
            <span class="text-gray-400 text-[10px] font-black uppercase tracking-[0.4em] mb-6 block">Nasional / Politik</span>
            <h1 class="font-news-title text-4xl md:text-6xl font-black leading-[1.1] mb-8 text-black">
                {{ $article->title }}
            </h1>
            
            <div class="flex items-center gap-6 py-8 border-y border-gray-100 mb-12">
                <div class="w-14 h-14 rounded-full bg-black flex items-center justify-center text-white font-black text-xs">AIRA</div>
                <div>
                    <p class="text-sm font-black uppercase tracking-tight text-black">Oleh Redaksi Aira News</p>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em] mt-2">{{ $article->created_at->format('d F Y | H:i') }} WIB</p>
                </div>
            </div>

            @if($article->image_path)
                <div class="mb-12 rounded-[2.5rem] overflow-hidden shadow-2xl">
                    <img src="{{ asset('storage/' . $article->image_path) }}" class="w-full h-auto object-cover" alt="{{ $article->title }}">
                    <div class="bg-gray-50 px-8 py-4 text-[10px] text-gray-400 font-bold uppercase tracking-widest border-t border-gray-100">
                        Foto: Arsip Redaksi Aira News Portal
                    </div>
                </div>
            @endif

            <div class="prose prose-lg max-w-none text-gray-700 leading-[2] font-medium space-y-8 text-lg">
                {!! nl2br(e($article->content)) !!}
            </div>

            <!-- Share Buttons -->
            <div class="mt-20 pt-12 border-t border-gray-100 flex flex-wrap items-center gap-8">
                <span class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400">Bagikan Artikel:</span>
                <div class="flex gap-4">
                    <div class="w-11 h-11 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center text-black font-bold text-xs cursor-pointer hover:bg-black hover:text-white transition shadow-sm">FB</div>
                    <div class="w-11 h-11 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center text-black font-bold text-xs cursor-pointer hover:bg-black hover:text-white transition shadow-sm">TW</div>
                    <div class="w-11 h-11 bg-gray-50 border border-gray-100 rounded-full flex items-center justify-center text-black font-bold text-xs cursor-pointer hover:bg-black hover:text-white transition shadow-sm">WA</div>
                </div>
            </div>
        </div>
    </article>

    <!-- Right: Sidebar (4 Columns) -->
    <aside class="lg:col-span-4 space-y-16">
        <div class="sticky top-28">
            <div class="flex items-center gap-4 mb-10">
                <h4 class="font-black text-xl uppercase tracking-tighter text-black">Terpopuler</h4>
                <div class="h-[1px] flex-grow bg-gray-200"></div>
            </div>
            
            <div class="space-y-10">
                @php
                    $trending = \App\Models\Article::where('id', '!=', $article->id)->latest()->take(5)->get();
                @endphp
                @forelse($trending as $index => $item)
                    <div class="flex gap-8 items-start group">
                        <span class="text-4xl font-black text-gray-100 group-hover:text-black transition leading-none italic font-news-title">{{ sprintf('%02d', $index + 1) }}</span>
                        <div class="pt-1">
                            <h5 class="font-bold text-sm leading-tight group-hover:underline transition decoration-black decoration-1 underline-offset-4 text-black">
                                <a href="{{ route('articles.show', $item->id) }}">{{ $item->title }}</a>
                            </h5>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-gray-400 font-bold italic">Tidak ada berita lain.</p>
                @endforelse
            </div>

            <!-- Promo -->
            <div class="mt-16 bg-gray-900 text-white p-10 rounded-[2.5rem] shadow-xl">
                <h4 class="font-news-title text-2xl font-black mb-6 leading-tight">Dukung <span class="text-gray-400 italic font-normal">Jurnalisme</span></h4>
                <p class="text-xs text-gray-400 mb-8 font-medium leading-relaxed uppercase tracking-wider">Akses konten eksklusif dan bebas iklan dengan Aira Plus.</p>
                <button class="w-full bg-white text-black font-black uppercase tracking-[0.2em] text-[10px] py-4 rounded-2xl hover:bg-gray-200 transition">Berlangganan</button>
            </div>
        </div>
    </aside>
</div>
@endsection
