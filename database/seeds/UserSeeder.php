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
            'name'                      => 'André',
            'email'                     => 'andreteixeira.csn@gmail.com',
            'password'                  => bcrypt('12345678'),
            'mobile_number'             => 911111112,
            'address'                   =>'Rua teste',
            'is_admin'                  => 1,
            'quote_request_email'       => 'andreteixeira.csn@gmail.com',
            'quote_request_is_active'   =>1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        \DB::table('users')->insert([
            'name'                      => 'Yeeyson',
            'email'                     => 'yeeysonduarte@gmail.com',
            'password'                  => bcrypt('12345678'),
            'mobile_number'             => 911111111,
            'address'                   =>'Rua teste',
            'is_admin'                  => 1,
            'quote_request_email'       => 'andreteixeira.csn@gmail.com',
            'quote_request_is_active'   =>1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        \DB::table('users')->insert([
            'name'                      => 'Diogo',
            'email'                     => 'geral@diogopinto.pt',
            'password'                  => bcrypt('12345678'),
            'mobile_number'             => 916884127,
            'address'                   =>'Marco Canaveses',
            'is_admin'                  => 1,
            'quote_request_email'       => 'geral@diogopinto.pt',
            'quote_request_is_active'   =>1,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);

    }
}
