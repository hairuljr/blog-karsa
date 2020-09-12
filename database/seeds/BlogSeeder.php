<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'category_id' => 1,
                'title' => 'Sharing Riset Karsa X Inixindo',
                'slug' => 'sharing-riset-karsa-x-inixindo',
                'writer' => 'Salma',
                'date_publish' => Carbon::now(),
                'thumbnail' => 'assets/img/blog/ksw-2019-1.jpg',
                'content' => 'Sabtu, 9 November 2019 adalah pelaksanaan event sharing riset Karsa (Komunitas Riset dan Sains). Ini merupakan event sharing kami yang kelima. Dua minggu sebelum acara kami sempat pesimis soal tempat, karena referensi yang terbatas. Memang sekarang sudah banyak coworking space dan cafe yang dapat dimanfaatkan, namun mempertimbangkan kapasitas anggota dan kantong, kami mengeliminasi opsi tersebut.
                Anggota Karsa terkonfirm hadir saat itu ada 20 orang, sangat tidak kondusif jika harus bergabung dengan pengunjung lain. Namun mahal juga jika menggunakan private room....',
                'status' => 'PUBLISH', //PENDING
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
