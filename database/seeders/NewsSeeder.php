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
            'date'=> "2099/01/01",
            'title' => 'ニュース1 シーダデータ',
            'content'=> 'ニュース1 シーダデータのコンテンツです。内容が入ります。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
