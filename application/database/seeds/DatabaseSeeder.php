<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       for($i = 1; $i <= 20 ; $i++) {
         DB::table('board')->insert([
           'table_name' => str_random(10),
           'user_id' => 4,
         ]);
       }
     }
}
