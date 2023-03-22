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
            'date'=> "2023/03/21",
            'title' => '2023年春彼岸会法要',
            'content'=> '2023年春の彼岸会を3月21日(火・祝)に勤修致します。ぜひ御参拝くださいませ。',
            'capacity'=> 50,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
