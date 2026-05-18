<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan kategori sudah ada
        $this->call(CategorySeeder::class);

        $teknologi = Category::where('slug', 'teknologi')->first();
        $olahraga = Category::where('slug', 'olahraga')->first();
        $kesehatan = Category::where('slug', 'kesehatan')->first();
        $pendidikan = Category::where('slug', 'pendidikan')->first();

        $posts = [
            [
                'title' => 'Mengenal Laravel Filament',
                'slug' => 'mengenal-laravel-filament',
                'category_id' => $teknologi?->id,
                'color' => '#3B82F6',
                'body' => 'Laravel Filament adalah admin panel yang powerful dan mudah dikustomisasi untuk aplikasi Laravel.',
                'tags' => json_encode(['laravel', 'filament', 'php']),
                'published' => true,
                'published_at' => '2026-01-10',
                'created_at' => '2026-01-10 08:00:00',
                'updated_at' => '2026-01-10 08:00:00',
            ],
            [
                'title' => 'Tips Belajar Pemrograman Web',
                'slug' => 'tips-belajar-pemrograman-web',
                'category_id' => $pendidikan?->id,
                'color' => '#10B981',
                'body' => 'Belajar pemrograman web membutuhkan konsistensi dan latihan rutin setiap hari.',
                'tags' => json_encode(['web', 'coding', 'belajar']),
                'published' => true,
                'published_at' => '2026-01-15',
                'created_at' => '2026-01-15 09:30:00',
                'updated_at' => '2026-01-15 09:30:00',
            ],
            [
                'title' => 'Olahraga Pagi untuk Programmer',
                'slug' => 'olahraga-pagi-untuk-programmer',
                'category_id' => $olahraga?->id,
                'color' => '#F59E0B',
                'body' => 'Programmer juga perlu olahraga agar tetap sehat dan produktif saat bekerja.',
                'tags' => json_encode(['olahraga', 'kesehatan', 'produktivitas']),
                'published' => true,
                'published_at' => '2026-02-01',
                'created_at' => '2026-02-01 07:00:00',
                'updated_at' => '2026-02-01 07:00:00',
            ],
            [
                'title' => 'Menjaga Kesehatan Mata saat Coding',
                'slug' => 'menjaga-kesehatan-mata-saat-coding',
                'category_id' => $kesehatan?->id,
                'color' => '#EF4444',
                'body' => 'Terlalu lama menatap layar dapat merusak mata. Ikuti aturan 20-20-20 untuk menjaga kesehatan mata.',
                'tags' => json_encode(['kesehatan', 'mata', 'coding']),
                'published' => true,
                'published_at' => '2026-02-14',
                'created_at' => '2026-02-14 10:00:00',
                'updated_at' => '2026-02-14 10:00:00',
            ],
            [
                'title' => 'REST API dengan Laravel',
                'slug' => 'rest-api-dengan-laravel',
                'category_id' => $teknologi?->id,
                'color' => '#8B5CF6',
                'body' => 'Membangun REST API dengan Laravel sangat mudah menggunakan fitur Resource dan Controller bawaan.',
                'tags' => json_encode(['api', 'laravel', 'backend']),
                'published' => false,
                'published_at' => null,
                'created_at' => '2026-03-01 11:00:00',
                'updated_at' => '2026-03-01 11:00:00',
            ],
            [
                'title' => 'Strategi Futsal Tingkat Lanjut',
                'slug' => 'strategi-futsal-tingkat-lanjut',
                'category_id' => $olahraga?->id,
                'color' => '#06B6D4',
                'body' => 'Futsal memerlukan kerjasama tim yang solid dan strategi yang matang untuk memenangkan pertandingan.',
                'tags' => json_encode(['futsal', 'olahraga', 'strategi']),
                'published' => true,
                'published_at' => '2026-03-10',
                'created_at' => '2026-03-10 14:00:00',
                'updated_at' => '2026-03-10 14:00:00',
            ],
            [
                'title' => 'Kurikulum Merdeka di Era Digital',
                'slug' => 'kurikulum-merdeka-di-era-digital',
                'category_id' => $pendidikan?->id,
                'color' => '#F97316',
                'body' => 'Kurikulum Merdeka memberikan kebebasan kepada sekolah untuk merancang pembelajaran yang sesuai kebutuhan siswa.',
                'tags' => json_encode(['pendidikan', 'kurikulum', 'digital']),
                'published' => true,
                'published_at' => '2026-04-01',
                'created_at' => '2026-04-01 08:30:00',
                'updated_at' => '2026-04-01 08:30:00',
            ],
            [
                'title' => 'Docker untuk Developer Laravel',
                'slug' => 'docker-untuk-developer-laravel',
                'category_id' => $teknologi?->id,
                'color' => '#0EA5E9',
                'body' => 'Docker mempermudah setup environment development Laravel agar konsisten di semua mesin.',
                'tags' => json_encode(['docker', 'laravel', 'devops']),
                'published' => false,
                'published_at' => null,
                'created_at' => '2026-04-20 09:00:00',
                'updated_at' => '2026-04-20 09:00:00',
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
