<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $srv = Category::where('code', 'SRV')->first()->id;
        $iot = Category::where('code', 'IOT')->first()->id;
        $drn = Category::where('code', 'DRN')->first()->id;

        // URUTAN PENTING: katalog diurutkan id terbesar dulu.
        // EQ-DRN-003 dimasukkan sebelum EQ-DRN-001 supaya di katalog 001 tampil lebih dulu.
        $items = [
            [
                'category_id' => $srv,
                'asset_code' => 'EQ-SRV-001',
                'name' => 'Dell PowerEdge T40 Server',
                'specification' => 'Xeon E-2224G, 16GB RAM, 1TB HDD',
                'condition' => 'baik',
                'status' => 'dipinjam',
                'daily_rental_fee' => 75000,
            ],
            [
                'category_id' => $srv,
                'asset_code' => 'EQ-SRV-002',
                'name' => 'Mini Server Intel NUC 11',
                'specification' => 'Core i5, 16GB RAM, 512GB NVMe',
                'condition' => 'baik',
                'status' => 'tersedia',
                'daily_rental_fee' => 40000,
            ],
            [
                'category_id' => $iot,
                'asset_code' => 'EQ-IOT-001',
                'name' => 'Kit Sensor IoT ESP32 Lengkap',
                'specification' => 'ESP32, DHT22, sensor ultrasonik, breadboard',
                'condition' => 'rusak_berat',
                'status' => 'dalam_perbaikan',
                'daily_rental_fee' => 10000,
            ],
            [
                'category_id' => $drn,
                'asset_code' => 'EQ-DRN-002',
                'name' => 'Parrot Anafi Drone Kamera 4K',
                'specification' => 'Drone lipat, kamera 4K HDR, 2 baterai',
                'condition' => 'baik',
                'status' => 'dipinjam',
                'daily_rental_fee' => 45000,
            ],
            [
                'category_id' => $drn,
                'asset_code' => 'EQ-DRN-003',
                'name' => 'FPV Racing Drone BetaFPV Cetus Pro',
                'specification' => 'Drone FPV pemula, goggles, remote',
                'condition' => 'rusak_ringan',
                'status' => 'tersedia',
                'daily_rental_fee' => 25000,
            ],
            [
                'category_id' => $drn,
                'asset_code' => 'EQ-DRN-001',
                'name' => 'DJI Mavic Air 2 Fly More Combo',
                'specification' => 'Drone kamera 4K, 3 baterai, remote controller',
                'condition' => 'baik',
                'status' => 'tersedia',
                'daily_rental_fee' => 50000,
            ],
        ];

        foreach ($items as $item) {
            Equipment::updateOrCreate(['asset_code' => $item['asset_code']], $item);
        }
    }
}