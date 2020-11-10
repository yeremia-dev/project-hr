<?php

use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0;$i<50;$i++)
        {
            DB::table('karyawans')->insert([
                'user_id' => 1,
                'nrp' => rand(0, 10),
                'nama_lengkap' => Str::random(10),
                'status' => 'PWKT1',
                'jabatan' => 'Manajer',
                'section' => 'Plant',
                'departemen' => 'Plant',
                'nama_nrp_atasan' => 'Julio / 12345',
                'email' => Str::random(10).'@gmail.com',
                'no_hp' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
