<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::truncate(); //把所有資料清空，並重置主鍵
        //$faker = Factory::create('zh_TW');
        Item::factory()->times(100)->create();

    }
}