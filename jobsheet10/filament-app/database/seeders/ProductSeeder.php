<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Laptop Gaming ASUS ROG',
                'sku'         => 'ASUS-ROG-001',
                'description' => 'Laptop gaming bertenaga tinggi dengan GPU RTX 4070, RAM 32GB, dan display 144Hz. Cocok untuk gaming dan editing.',
                'price'       => 25000000,
                'stock'       => 15,
                'image'       => null,
                'is_active'   => true,
                'is_featured' => true,
            ],
            [
                'name'        => 'Mechanical Keyboard Keychron K2',
                'sku'         => 'KYCHRON-K2-002',
                'description' => 'Keyboard mekanikal kompak 75%, kompatibel dengan Windows dan Mac, dilengkapi hot-swap switch.',
                'price'       => 1350000,
                'stock'       => 40,
                'image'       => null,
                'is_active'   => true,
                'is_featured' => false,
            ],
            [
                'name'        => 'Monitor Ultrawide LG 34"',
                'sku'         => 'LG-UW34-003',
                'description' => 'Monitor ultrawide 34 inci resolusi 3440x1440, panel IPS, refresh rate 144Hz, HDR10.',
                'price'       => 8500000,
                'stock'       => 8,
                'image'       => null,
                'is_active'   => true,
                'is_featured' => true,
            ],
            [
                'name'        => 'Mouse Logitech MX Master 3',
                'sku'         => 'LOGI-MX3-004',
                'description' => 'Mouse ergonomis premium dengan scroll MagSpeed, koneksi Bluetooth & USB receiver, cocok untuk produktivitas.',
                'price'       => 1299000,
                'stock'       => 60,
                'image'       => null,
                'is_active'   => true,
                'is_featured' => false,
            ],
            [
                'name'        => 'SSD Samsung 970 EVO 1TB',
                'sku'         => 'SAM-SSD-1T-005',
                'description' => 'SSD NVMe PCIe 3.0 dengan kecepatan baca 3500MB/s, garansi 5 tahun, kapasitas 1TB.',
                'price'       => 1750000,
                'stock'       => 25,
                'image'       => null,
                'is_active'   => true,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
