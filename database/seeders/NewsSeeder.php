<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            'admin_id'=> true,
            'date'=> "2023/03/22",
            'title' => 'Teralink公開',
            'content'=> '門信徒とお寺の住職をつなげるアプリ Teralink / テラリンク を公開しました。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
