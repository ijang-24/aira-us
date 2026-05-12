@extends('layouts.app')

@section('title', 'Portal Berita Terpercaya')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
    
    <!-- Left: Main Content (8 Columns) -->
    <div class="lg:col-span-8 space-y-16">
        
        @if($articles->count() > 0)
            @php $hero = $articles->first(); @endphp
            <!-- Hero Article -->
            <div class="group relative h-[550px] w-full overflow-hidden rounded-[2.5rem] bg-gray-100 shadow-2xl">
                @if($hero->image_path)
                    <img src="{{ asset('storage/' . $hero->image_path) }}" class="h-full w-full object-cover transition duration-1000 group-hover:scale-105" alt="{{ $hero->title }}">
                @else
                    <div class="h-full w-full bg-gray-50 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
                <div class="absolute inset-0 headline-gradient flex flex-col justify-end p-12">
                    <span class="mb-6 inline-block bg-white px-5 py-1.5 text-[10px] font-black uppercase tracking-[0.3em] text-black rounded-full w-fit">HEADLINE</span>
                    <h2 class="font-news-title text-4xl md:text-5xl font-black text-white leading-[1.1] mb-6 group-hover:text-gray-200 transition">
                        <a href="{{ route('articles.show', $hero->id) }}">{{ $hero->title }}</a>
                    </h2>
                    <div class="flex items-center gap-6 text-gray-300 text-xs font-bold uppercase tracking-widest">
                        <span>Oleh Redaksi</span>
                        <span class="w-1 h-1 bg-white rounded-full"></span>
                        <span>{{ $hero->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @foreach($articles->skip(1) as $article)
                    <article class="group">
                        <div class="aspect-[16/10] w-full overflow-hidden rounded-3xl bg-gray-50 mb-8 shadow-sm">
                            @if($article->image_path)
                                <img src="{{ asset('storage/' . $article->image_path) }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110" alt="">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <span class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4 block">Nasional</span>
                        <h3 class="font-news-title text-2xl font-black leading-tight group-hover:text-gray-600 transition mb-4">
                            <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 font-medium">
                            {{ Str::limit($article->content, 130) }}
                        </p>
                    </article>
                @endforeach
            </div>
        @else
            <div class="py-32 text-center border-2 border-dashed border-gray-100 rounded-[3rem]">
                <p class="text-gray-300 font-bold italic">Belum ada berita yang tersedia saat ini.</p>
            </div>
        @endif
    </div>

    <!-- Right: Sidebar (4 Columns) -->
    <aside class="lg:col-span-4 space-y-16">
        <!-- Trending Section -->
        <div>
            <div class="flex items-center gap-4 mb-10">
                <h4 class="font-black text-xl uppercase tracking-tighter">Terpopuler</h4>
                <div class="h-[1px] flex-grow bg-gray-200"></div>
            </div>
            <div class="space-y-10">
                @forelse($articles->take(5) as $index => $trending)
                    <div class="flex gap-8 items-start group">
                        <span class="text-4xl font-black text-gray-100 group-hover:text-black transition leading-none italic font-news-title">{{ sprintf('%02d', $index + 1) }}</span>
                        <div class="pt-1">
                            <h5 class="font-bold text-sm leading-snug group-hover:underline transition decoration-black decoration-1 underline-offset-4">
                                <a href="{{ route('articles.show', $trending->id) }}">{{ $trending->title }}</a>
                            </h5>
                            <span class="text-[9px] text-gray-400 font-black uppercase tracking-widest mt-3 block">Politik &bull; {{ $trending->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-gray-400 font-bold italic">Data tidak tersedia.</p>
                @endforelse
            </div>
        </div>

        <!-- Newsletter -->
        <div class="bg-gray-50 border border-gray-100 p-10 rounded-[2.5rem]">
            <h4 class="font-news-title text-2xl font-black mb-4 leading-tight text-black">Aira <span class="text-gray-400 italic font-normal">Digest</span></h4>
            <p class="text-gray-500 text-xs mb-8 font-medium leading-relaxed">Berita pilihan yang dikurasi khusus untuk Anda setiap hari Senin - Jumat.</p>
            <div class="space-y-4">
                <input type="email" placeholder="Alamat Email..." class="w-full bg-white border border-gray-200 rounded-2xl px-6 py-4 text-xs outline-none focus:border-black transition shadow-sm">
                <button class="w-full bg-black text-white font-black uppercase tracking-[0.2em] text-[10px] py-4 rounded-2xl hover:bg-gray-800 transition shadow-lg shadow-gray-200">Berlangganan</button>
            </div>
        </div>
    </aside>
</div>
@endsection
