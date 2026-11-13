<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SiswaSekolah;
use App\Models\Perangkat;
use App\Models\KategoriKerusakan;
use App\Models\Aduan;
use App\Models\Tanggapan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Admin
        $admin = User::create([
            'name'     => 'Keigo Avrel Purnomo (Teknisi)',
            'email'    => 'admin@smk.sch.id',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
            'kelas'    => 'Koordinator Lab',
            'no_telp'  => '081226609314',
        ]);

        // 2. Data Master Siswa Sekolah (Dari TU / Akun Belajar)
        $masterSiswa = [
            [
                'nis'           => '10245',
                'nama'          => 'Keigo Avrel Purnomo',
                'kelas'         => 'XII RPL B',
                'email_belajar' => 'keigo@smk.belajar.id',
            ],
            [
                'nis'           => '10246',
                'nama'          => 'Siti Nuraini',
                'kelas'         => 'XII RPL B',
                'email_belajar' => 'siti.nuraini@smk.belajar.id',
            ],
            [
                'nis'           => '10247',
                'nama'          => 'Rafi Aditya',
                'kelas'         => 'XI RPL A',
                'email_belajar' => 'rafi.aditya@smk.belajar.id',
            ],
            [
                'nis'           => '10248',
                'nama'          => 'Dwi Cahyono',
                'kelas'         => 'XI RPL B',
                'email_belajar' => 'dwi.cahyono@smk.belajar.id',
            ],
        ];

        foreach ($masterSiswa as $ms) {
            SiswaSekolah::create($ms);
        }

        // 3. User Siswa yang Sudah Terdaftar (Akun Demo)
        $siswa = User::create([
            'name'     => 'Keigo Avrel Purnomo',
            'nis'      => '10245',
            'email'    => 'keigo@smk.belajar.id',
            'password' => Hash::make('siswa123'),
            'role'     => 'siswa',
            'kelas'    => 'XII RPL B',
            'no_telp'  => '089876543210',
        ]);

        // 4. Kategori Kerusakan
        $katHardware = KategoriKerusakan::create(['nama_kategori' => 'Hardware', 'deskripsi' => 'Kerusakan fisik seperti monitor, keyboard, mouse, ram, dll.']);
        $katSoftware = KategoriKerusakan::create(['nama_kategori' => 'Software', 'deskripsi' => 'Masalah OS, instalasi software, driver, crash aplikasi.']);
        $katJaringan = KategoriKerusakan::create(['nama_kategori' => 'Jaringan', 'deskripsi' => 'Kabel LAN lepas, tidak dapat IP, internet lambat/putus.']);
        $katLainnya  = KategoriKerusakan::create(['nama_kategori' => 'Lainnya', 'deskripsi' => 'Keluhan fasilitas meja, kursi, stopkontak, listrik.']);

        // 4. Perangkat Lab Seluruh SMKN 5 Surakarta (Lab RPL 1, 3, 4 & Lab ASM 1, 2, 3 masing-masing 40 PC)
        Perangkat::seedDefaultLabs();

        // 5. Data Aduan dikosongkan agar pengguna dapat menginput aduan asli dengan foto bukti
    }
}