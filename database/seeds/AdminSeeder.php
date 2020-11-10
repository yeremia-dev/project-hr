<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@recmosis-hr.com',
            'is_admin' => 1,
            'password' => Hash::make('admin-recmosis1'),
        ]);

//        DB::table('users')->insert([
//            'name' => 'User',
//            'email' => 'user@gmail.com',
//            'password' => Hash::make('user123'),
//        ]);
    }
}
