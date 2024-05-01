<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LayananSeeder::class,
            PaketSeeder::class,
            PenerimaSeeder::class,
            UserSeeder::class,
        ]);
    }
}
class LayananSeeder extends Seeder
{
    public function run()
    {
        DB::table('layanan')->insert([
            ['nama_layanan' => 'Reguler', 'biaya' => 5000],
        ]);
    }
}

class PaketSeeder extends Seeder
{
    public function run()
    {
        DB::table('paket')->insert([
            ['berat' => 1, 'deskripsi' => 'Buku Tulis'],
            ['berat' => 2, 'deskripsi' => 'Buku Pelajaran'],
            ['berat' => 3, 'deskripsi' => 'Elektronik'],
            ['berat' => 4, 'deskripsi' => 'Makanan'],
            ['berat' => 5, 'deskripsi' => 'Pakaian'],
        ]);
    }
}

class PenerimaSeeder extends Seeder
{
    public function run()
    {
        DB::table('penerima')->insert([
            ['nama' => 'John Doe', 'nomor_telepon' => '081234567890'],
            ['nama' => 'Jane Doe', 'nomor_telepon' => '082145678901'],
            ['nama' => 'Peter Smith', 'nomor_telepon' => '083856789012'],
        ]);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'fullname' => 'Khoirul Huda',
                'username' => 'huda',
                'email' => 'huda@gmail.com',
                'password' => '$2y$12$bedxw3sxUuaNxGplxaUHD.dq8FRRfof.Ux35lYuJ3WBc/0Mpmp.ym',
                'level' => 'user',
                'alamat' => 'Bandung',
            ],
            [
                'fullname' => 'Michail',
                'username' => 'Michail',
                'email' => 'michail@gmail.com',
                'password' => '$2y$12$DdhaeFU8nHOZC4XHj7qd0.JwYze46R98xGsDvKFhoeC2VAhKnAsS2',
                'level' => 'admin',
                'alamat' => 'Jakarta',
            ],
        ]);
    }
}