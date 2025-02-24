<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data ke table pegawai
        DB::table('detail_profile')->insert([
            'address'    => 'Nganjuk',
            'nomor_tlp'  => '08xxxxxxxx',
            'ttl'        => '2005-7-7',
            'foto'       => 'picture.png'
        ]);
    }
}
