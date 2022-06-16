<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'title'       => 'Fotografias',
            'description' => 'fotografia',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        \DB::table('categories')->insert([
            'title'       => 'Videos',
            'description' => 'videos',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        \DB::table('categories')->insert([
            'title'       => 'Batizados',
            'description' => 'batizados',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        \DB::table('categories')->insert([
            'title'       => 'Aniversários',
            'description' => 'aniversarios',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        \DB::table('categories')->insert([
            'title'       => 'Corporate',
            'description' => 'corporate',
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
    
}
