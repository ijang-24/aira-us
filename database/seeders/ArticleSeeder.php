<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Inovasi Teknologi AI di Indonesia Semakin Pesat',
                'content' => 'Perkembangan kecerdasan buatan (AI) di Indonesia telah mencapai babak baru dengan munculnya berbagai startup lokal yang fokus pada solusi automasi untuk UMKM. Pemerintah juga mulai mengintegrasikan AI dalam layanan publik untuk meningkatkan efisiensi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wisata Alam Tersembunyi di Kalimantan Jadi Sorotan Dunia',
                'content' => 'Beberapa lokasi wisata alam di pedalaman Kalimantan mulai menarik perhatian turis mancanegara. Keindahan hutan hujan tropis dan budaya lokal yang masih asli menjadi daya tarik utama bagi para pencari petualangan.',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
            [
                'title' => 'Timnas Garuda Siap Hadapi Laga Krusial Pekan Depan',
                'content' => 'Persiapan tim nasional sepak bola Indonesia mencapai puncaknya menjelang pertandingan penentuan kualifikasi. Pelatih optimis anak asuhnya bisa memberikan hasil terbaik di depan pendukung sendiri.',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'title' => 'Tips Menjaga Kesehatan Mental di Era Digital',
                'content' => 'Menghadapi arus informasi yang tiada henti, menjaga kesehatan mental menjadi sangat penting. Para ahli menyarankan untuk melakukan digital detox secara berkala dan tetap menjaga koneksi sosial di dunia nyata.',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'title' => 'Resep Kuliner Nusantara yang Mulai Go International',
                'content' => 'Rendang dan Nasi Goreng mungkin sudah populer, namun kini banyak bumbu rahasia nusantara lainnya yang mulai digemari oleh chef-chef ternama di Eropa dan Amerika.',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
