<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    
    public function run()
    {
        factory('App\Todo',5)->create();

    }
}