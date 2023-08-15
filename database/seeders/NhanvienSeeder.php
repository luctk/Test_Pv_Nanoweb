<?php

namespace Database\Seeders;

use App\Models\Nhanvien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhanvienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nhanvien::factory(20)->create();
    }
}
