<?php

namespace Database\Seeders;

use App\Models\Pasien;
use App\Models\RumahSakit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::Create([
            'username' => 'admin',
            'password' => Hash::make('admin')
        ]);

        RumahSakit::Create([
            'nama_rumah_sakit' => 'Bethesda Hospital',
            'alamat' => 'Jl. Jend. Sudirman No.70, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224',
            'email' => 'bethesda@email.com',
            'telepon' => '0274586688'
        ]);
        
        RumahSakit::Create([
            'nama_rumah_sakit' => 'Rumah Sakit Umum Daerah (RSUD) Kota Yogyakarta',
            'alamat' => 'Jl. Ki Ageng Pemanahan No.1-6, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55162',
            'email' => 'rsudkotajogja@email.com',
            'telepon' => '0274371195'
        ]);
        
        RumahSakit::Create([
            'nama_rumah_sakit' => 'PKU Muhammadiyah Hospital Of Yogyakarta',
            'alamat' => 'Jl. KH. Ahmad Dahlan No.20, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122',
            'email' => 'pkumuhammadiyajogja@email.com',
            'telepon' => '0274512653'
        ]);
        
        RumahSakit::Create([
            'nama_rumah_sakit' => 'Panti Rapih Hospital',
            'alamat' => 'Jl. Cik Di Tiro No.30, Samirono, Terban, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223',
            'email' => 'pantirapih@email.com',
            'telepon' => '0274563333'
        ]);
        
        RumahSakit::Create([
            'nama_rumah_sakit' => 'Dr. Sardjito General Hospital',
            'alamat' => 'Jl. Kesehatan Jl. Kesehatan Sendowo No.1, Sendowo, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281',
            'email' => 'rssardjito@email.com',
            'telepon' => '0274631190'
        ]);

        Pasien::Create([
            'nama_pasien' => 'a',
            'alamat' => 'aa',
            'no_telepon' => '1234567890',
            'rumah_sakit_id' => 1,
        ]);

        Pasien::Create([
            'nama_pasien' => 'b',
            'alamat' => 'bb',
            'no_telepon' => '901647532142',
            'rumah_sakit_id' => 3,
        ]);

        Pasien::Create([
            'nama_pasien' => 'c',
            'alamat' => 'cc',
            'no_telepon' => '90839476923',
            'rumah_sakit_id' => 2,
        ]);

        Pasien::Create([
            'nama_pasien' => 'd',
            'alamat' => 'dd',
            'no_telepon' => '9382476538',
            'rumah_sakit_id' => 2,
        ]);

        Pasien::Create([
            'nama_pasien' => 'e',
            'alamat' => 'ee',
            'no_telepon' => '3899019387',
            'rumah_sakit_id' => 3,
        ]);

        Pasien::Create([
            'nama_pasien' => 'f',
            'alamat' => 'ff',
            'no_telepon' => '932086920',
            'rumah_sakit_id' => 1,
        ]);

        Pasien::Create([
            'nama_pasien' => 'g',
            'alamat' => 'gg',
            'no_telepon' => '9032809348',
            'rumah_sakit_id' => 4,
        ]);

        Pasien::Create([
            'nama_pasien' => 'h',
            'alamat' => 'hh',
            'no_telepon' => '09380940349',
            'rumah_sakit_id' => 5,
        ]);

        Pasien::Create([
            'nama_pasien' => 'i',
            'alamat' => 'ii',
            'no_telepon' => '901238940134',
            'rumah_sakit_id' => 5,
        ]);

        Pasien::Create([
            'nama_pasien' => 'j',
            'alamat' => 'jj',
            'no_telepon' => '120938476389',
            'rumah_sakit_id' => 5,
        ]);

        Pasien::Create([
            'nama_pasien' => 'k',
            'alamat' => 'kk',
            'no_telepon' => '9083762493',
            'rumah_sakit_id' => 4,
        ]);
    }
}
