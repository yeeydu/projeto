<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name'        => 'admin',
            'email'       => 'admin@admin.com',
            'password'    => bcrypt('12345678'),
            'is_admin'    => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
        \DB::table('users')->insert([
            'name'        => 'André',
            'email'       => 'andreteixeira.csn@gmail.com',
            'password'    => bcrypt('12345678'),
            'is_admin'    => 1,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    }
}
