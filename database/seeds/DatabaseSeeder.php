<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admins')->insert([
            'name'=>'Hoàng Đức Anh',
            'email'=>'cucanhlhp9@gmail.com',
            'password'=>bcrypt('anhdaica')
        ]);
    }
}
