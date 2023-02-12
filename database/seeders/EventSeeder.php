<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'admin_id'=> true,
            'date'=> "2099/01/01",
            'title' => 'イベント1 シーダデータ',
            'content'=> 'イベント1 シーダデータのコンテンツです。内容が入ります。',
            'capacity'=> 20,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
