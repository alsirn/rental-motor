<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Motor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Rental',
            'email' => 'admin@rental.test',
            'no_hp' => '081111111111',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'verification_status' => 'verified',
        ]);

        User::create([
            'name' => 'Tukang Rental',
            'email' => 'tukang@rental.test',
            'no_hp' => '082222222222',
            'password' => Hash::make('password'),
            'role' => 'tukang',
            'verification_status' => 'verified',
        ]);

        User::create([
            'name' => 'Penyewa Demo',
            'email' => 'user@rental.test',
            'no_hp' => '083333333333',
            'password' => Hash::make('password'),
            'role' => 'user',
            'verification_status' => 'verified',
        ]);

        $yamaha = Brand::create(['nama_brand' => 'Yamaha']);
        $honda = Brand::create(['nama_brand' => 'Honda']);
        $vespa = Brand::create(['nama_brand' => 'Vespa']);

        Motor::insert([
            ['brand_id' => $yamaha->id, 'nama' => 'Yamaha Nmax 155', 'harga' => 150000, 'no_polisi' => 'B1234ABC', 'catatan' => 'Nyaman untuk perjalanan jauh', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => $yamaha->id, 'nama' => 'Yamaha Aerox', 'harga' => 180000, 'no_polisi' => 'B2211YMH', 'catatan' => 'Sporty dan irit', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => $honda->id, 'nama' => 'Honda Vario 160', 'harga' => 140000, 'no_polisi' => 'B7742HND', 'catatan' => 'Bagasi luas untuk harian', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => $honda->id, 'nama' => 'Honda PCX', 'harga' => 170000, 'no_polisi' => 'B9001PCX', 'catatan' => 'Premium matic', 'status' => false, 'created_at' => now(), 'updated_at' => now()],
            ['brand_id' => $vespa->id, 'nama' => 'Vespa Sprint', 'harga' => 250000, 'no_polisi' => 'B7766VSP', 'catatan' => 'Gaya klasik modern', 'status' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
