<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Article::truncate(); //把所有資料清空，並重置主鍵
      $faker = Factory::create('zh_TW');
      Article::factory()->times(100)->create();

      //
    }
}