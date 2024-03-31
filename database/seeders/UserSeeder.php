<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('Akun')->insert([
            [
                'fullname' => 'Khoirul Huda',
                'username' => 'huda',
                'email' => 'huda@gmail.com',
                'password' => '12345678',
                'level' => 'user',
                'alamat' => 'Indonesia',
                'dompet' => '1',
            ],
            [
                'fullname' => 'Michail',
                'username' => 'michail',
                'email' => 'michail@gmail.com',
                'password' => '12345678',
                'level' => 'admin',
                'alamat' => 'Indonesia',
                'dompet' => '2',
            ],
            [
                'fullname' => 'Achbar Wahyudhi', 
                'username' => 'achbar',
                'email' => ' achbar@gmail.com',
                'password' => '12345678',
                'level' => 'kurir',
                'alamat' => 'Indonesia',
                'dompet' => '3',
            ],
        ]);
    }
}
